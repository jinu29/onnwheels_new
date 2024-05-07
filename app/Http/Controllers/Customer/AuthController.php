<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;
use App\CentralLogics\Helpers;
use Illuminate\Support\Carbon;
use App\Mail\EmailVerification;
use App\Mail\LoginVerification;
use App\Models\BusinessSetting;
use App\CentralLogics\SMS_module;
use App\Models\WalletTransaction;
use App\Models\EmailVerifications;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\User;
use App\Models\Guest;
use Carbon\CarbonInterval;
use Modules\Gateways\Traits\SmsGateway;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => ['required', 'min:8'],
        ], [
            'f_name.required' => 'The first name field is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Referral Code Logic
        $ref_by = null;
        if ($request->ref_code) {
            // Check if referral code exists and is valid
            $referar_user = User::where('ref_code', $request->ref_code)->first();
            if (!$referar_user || !$referar_user->status) {
                return redirect()->back()->withErrors(['ref_code' => 'Invalid referral code.'])->withInput();
            }

            // Check if referral code already used
            if (WalletTransaction::where('reference', $request->phone)->exists()) {
                return redirect()->back()->withErrors(['phone' => 'Referral code already used.'])->withInput();
            }

            // Send notification to referrer user
            $notification_data = [
                'title' => translate('messages.Your_referral_code_is_used_by') . ' ' . $request->f_name . ' ' . $request->l_name,
                'description' => translate('Be prepare to receive when they complete there first purchase'),
                'order_id' => 1,
                'image' => '',
                'type' => 'referral_code',
            ];

            if ($referar_user->cm_firebase_token) {
                Helpers::send_push_notif_to_device($referar_user->cm_firebase_token, $notification_data);
                DB::table('user_notifications')->insert([
                    'data' => json_encode($notification_data),
                    'user_id' => $referar_user->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            // Set ref_by value
            $ref_by = $referar_user->id;
        }

        // Create User
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
            'ref_by' => $ref_by,
            'password' => bcrypt($request->password),
        ]);
        // Generate referral code
        $user->ref_code = Helpers::generate_referer_code($user);
        $user->save();

        // Send verification emails/SMS
        $customer_verification = BusinessSetting::where('key', 'customer_verification')->first()->value;

        if ($customer_verification && env('APP_MODE') != 'demo') {
            // Check OTP interval time
            $otp_interval_time = 60; //seconds
            $verification_data = DB::table('phone_verifications')->where('phone', $request->phone)->first();

            if (isset($verification_data) && Carbon::parse($verification_data->updated_at)->diffInSeconds() < $otp_interval_time) {
                $time = $otp_interval_time - Carbon::parse($verification_data->updated_at)->diffInSeconds();
                return redirect()->back()->withErrors(['otp' => translate('messages.please_try_again_after_') . $time . ' ' . translate('messages.seconds')])->withInput();
            }

            // Generate OTP
            $otp = rand(1000, 9999);
            DB::table('phone_verifications')->updateOrInsert(
                ['phone' => $request->phone],
                [
                    'token' => $otp,
                    'otp_hit_count' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            // Send OTP via mail or SMS
            $mail_status = Helpers::get_mail_status('registration_otp_mail_status_user');
            if (config('mail.status') && $mail_status == '1') {
                Mail::to($request->email)->send(new EmailVerification($otp, $request->f_name));
            }
            //for payment and sms gateway addon
            $published_status = 0;
            $payment_published_status = config('get_payment_publish_status');
            if (isset($payment_published_status[0]['is_published'])) {
                $published_status = $payment_published_status[0]['is_published'];
            }
            // dd($published_status);

            if ($published_status == 1) {
                $response = SmsGateway::send($request->phone, $otp);
                Log::info("OTP Send: " . $response);
            } else {
                $response = SMS_module::send($request->phone, $otp);
            }

            if ($response != 'success') {
                return redirect()->back()->withErrors(['otp' => translate('messages.faield_to_send_sms')])->withInput();
            }
        }

        // Send registration mail
        try {
            $mail_status = Helpers::get_mail_status('registration_mail_status_user');
            if (config('mail.status') && $request->email && $mail_status == '1') {
                Mail::to($request->email)->send(new \App\Mail\CustomerRegistration($request->f_name . ' ' . $request->l_name));
            }
        } catch (\Exception $ex) {
            info($ex->getMessage());
        }

        // Redirect to OTP verification page
        return redirect()->route('user.otp', ['phone' => $request->phone])->with([
            'token' => "hi",
            'is_phone_verified' => 0,
            'phone_verify_end_url' => "api/v1/auth/verify-phone",
        ]);
    }

    public function signup()
    {
        return view('auth.customer.signup');
    }

    public function otp(Request $request)
    {
        $phone = $request->input('phone');
        return view('auth.customer.otp', ['phone' => $phone]);
    }

    public function loginPage()
    {
        try {

            return view('auth.customer.login');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return $errorMessage;
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->isAdmin()) {
                    // Redirect admin to admin dashboard
                    return redirect()->route('adminIndex')->with('success', 'Login successful!');
                } elseif ($user->isVendor()) {
                    // Redirect vendor to vendor dashboard
                    return redirect()->route('vendorIndex')->with('success', 'Login successful!');
                } else {
                    // Handle other roles if necessary
                    return redirect()->route('home')->with('success', 'Login successful!');
                }
            } else {
                // Authentication failed
                return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return $errorMessage;
        }
    }

    public function verifyPhone(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'otp' => 'required',
        ]);
        $otpArray = $request->otp;
        $otpString = implode('', $otpArray);

        Log::info('', ['otp' => $otpString]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Find user by phone number
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            // Check if phone number is already verified
            if ($user->is_phone_verified) {
                return redirect()->route('verification.success')->with('success', translate('messages.phone_number_is_already_verified'));
            }

            // Validate OTP
            $verification_data = DB::table('phone_verifications')->where([
                'phone' => $request->phone,
                'token' => $otpString,
            ])->first();

            if ($verification_data) {
                // Delete verification data
                DB::table('phone_verifications')->where([
                    'phone' => $request->phone,
                    'token' => $otpString,
                ])->delete();

                // Mark phone number as verified
                $user->is_phone_verified = 1;
                $user->save();

                auth()->login($user);

                return redirect()->route('home')->with('success', translate('messages.phone_number_verified_successfully'));
            } else {
                // OTP validation failed
                $max_otp_hit = 5;
                $max_otp_hit_time = 60; // seconds
                $temp_block_time = 600; // seconds

                $verification_data = DB::table('phone_verifications')->where('phone', $request->phone)->first();

                if ($verification_data) {
                    // Handle OTP attempts
                    if ($verification_data->otp_hit_count >= $max_otp_hit && Carbon::parse($verification_data->updated_at)->diffInSeconds() < $max_otp_hit_time && $verification_data->is_temp_blocked == 0) {
                        // Temporarily block OTP verification
                        DB::table('phone_verifications')->updateOrInsert(
                            ['phone' => $request->phone],
                            [
                                'is_temp_blocked' => 1,
                                'temp_block_time' => now(),
                                'updated_at' => now(),
                            ]
                        );

                        return redirect()->back()->with('error', translate('messages.too_many_attempts'));
                    }

                    // Update OTP hit count
                    DB::table('phone_verifications')->updateOrInsert(
                        ['phone' => $request->phone],
                        [
                            'otp_hit_count' => DB::raw('otp_hit_count + 1'),
                            'updated_at' => now(),
                            'temp_block_time' => null,
                        ]
                    );
                }

                return redirect()->back()->with('error', translate('messages.phone_number_and_otp_not_matched'));
            }
        }

        return redirect()->back()->with('error', translate('messages.not_found'));
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function social_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'unique_id' => 'required',
            'email' => 'required_if:medium,google,facebook|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'medium' => 'required|in:google,facebook,apple',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }

        $client = new Client();
        $token = $request['token'];
        $email = $request['email'];
        $unique_id = $request['unique_id'];
        try {
            if ($request['medium'] == 'google') {
                $res = $client->request('GET', 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . $token);
                $data = json_decode($res->getBody()->getContents(), true);
            } elseif ($request['medium'] == 'facebook') {
                $res = $client->request('GET', 'https://graph.facebook.com/' . $unique_id . '?access_token=' . $token . '&&fields=name,email');
                $data = json_decode($res->getBody()->getContents(), true);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'wrong credential.', 'message' => $e->getMessage()], 403);
        }

        if ($request['medium'] != 'apple' && strcmp($email, $data['email']) === 0) {
            $name = explode(' ', $data['name']);
            if (count($name) > 1) {
                $fast_name = implode(" ", array_slice($name, 0, -1));
                $last_name = end($name);
            } else {
                $fast_name = implode(" ", $name);
                $last_name = '';
            }
            $user = User::where('email', $email)->first();
            if (isset($user) == false) {
                //Check Exists Ref Code
                $check_duplicate_ref = WalletTransaction::where('reference', $request->phone)->first();

                //Check Exists Ref Code Condition
                if ($check_duplicate_ref) {
                    return response()->json(['errors' => ['code' => 'ref_code', 'message' => 'Referral code already used']]);
                } else {
                    if (!isset($data['id']) && !isset($data['kid'])) {
                        return response()->json(['error' => 'wrong credential.'], 403);
                    }
                    $pk = isset($data['id']) ? $data['id'] : $data['kid'];
                    $user = User::create([
                        'f_name' => $fast_name,
                        'l_name' => $last_name,
                        'email' => $email,
                        'phone' => $request->phone,
                        'password' => bcrypt($pk),
                        'login_medium' => $request['medium'],
                        'social_id' => $pk,
                    ]);

                    $user->ref_code = Helpers::generate_referer_code();
                    $user->save();
                }
            } else {
                return response()->json([
                    'errors' => [
                        ['code' => 'auth-004', 'message' => translate('messages.email_already_exists')]
                    ]
                ], 403);
            }

            $data = [
                'phone' => $user->phone,
                'password' => $user->social_id
            ];
            $customer_verification = BusinessSetting::where('key', 'customer_verification')->first()->value;
            if (auth()->loginUsingId($user->id)) {
                $token = auth()->user()->createToken('RestaurantCustomerAuth')->accessToken;
                if (!auth()->user()->status) {
                    $errors = [];
                    array_push($errors, ['code' => 'auth-003', 'message' => translate('messages.your_account_is_blocked')]);
                    return response()->json([
                        'errors' => $errors
                    ], 403);
                }
                if ($customer_verification && !auth()->user()->is_phone_verified && env('APP_MODE') != 'demo') {
                    // $interval_time = BusinessSetting::where('key', 'otp_interval_time')->first();
                    // $otp_interval_time= isset($interval_time) ? $interval_time->value : 20;
                    $otp_interval_time = 60; //seconds
                    $phone_verification_data = DB::table('phone_verifications')->where('phone', $request['phone'])->first();
                    if (isset($phone_verification_data) && Carbon::parse($phone_verification_data->updated_at)->DiffInSeconds() < $otp_interval_time) {
                        $time = $otp_interval_time - Carbon::parse($phone_verification_data->updated_at)->DiffInSeconds();
                        $errors = [];
                        array_push($errors, ['code' => 'otp', 'message' => translate('messages.please_try_again_after_') . $time . ' ' . translate('messages.seconds')]);
                        return response()->json([
                            'errors' => $errors
                        ], 405);
                    }

                    $otp = rand(1000, 9999);
                    DB::table('phone_verifications')->updateOrInsert(
                        ['phone' => $request['phone']],
                        [
                            'token' => $otp,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                    //for payment and sms gateway addon
                    $published_status = 0;
                    $payment_published_status = config('get_payment_publish_status');
                    if (isset($payment_published_status[0]['is_published'])) {
                        $published_status = $payment_published_status[0]['is_published'];
                    }

                    if ($published_status == 1) {
                        $response = SmsGateway::send($request['phone'], $otp);
                    } else {
                        $response = SMS_module::send($request['phone'], $otp);
                    }
                    if ($response != 'success') {

                        $errors = [];
                        array_push($errors, ['code' => 'otp', 'message' => translate('messages.faield_to_send_sms')]);
                        return response()->json([
                            'errors' => $errors
                        ], 403);
                    }
                }
                return response()->json(['token' => $token, 'is_phone_verified' => auth()->user()->is_phone_verified], 200);
            } else {
                $errors = [];
                array_push($errors, ['code' => 'auth-001', 'message' => 'Unauthorized.']);
                return response()->json([
                    'errors' => $errors
                ], 401);
            }


        }

        return response()->json(['error' => translate('messages.email_does_not_match')]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'f_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|unique:users,phone,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $user = User::findOrFail($id);
        $user->f_name = $request->f_name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/profile/'), $imageName);
            $user->image = $imageName;

            // Optionally delete previous image if it exists
            if ($user->image && file_exists(public_path('assets/' . $user->image))) {
                unlink(public_path('assets/' . $user->image));
            }
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

}
