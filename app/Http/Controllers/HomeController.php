<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\OrderConfirmationMail;
use App\Models\Review;
use App\Models\Station;
use App\Scopes\StoreScope;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use App\Models\AdminFeature;
use App\Models\AdminPromotionalBanner;
use App\Models\AdminSpecialCriteria;
use App\Models\AdminTestimonial;
use App\Models\BusinessSetting;
use App\Models\Category;
use App\Models\User;
use App\Models\DataSetting;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Mail;
use Illuminate\Support\Facades\Http;
use Razorpay\Api\Api;
use Session;
use Carbon\Carbon;
use App\Scopes\ZoneScope;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = DataSetting::with('translations')->where('type', 'admin_landing_page')->get();
        $data = [];
        foreach ($datas as $key => $value) {
            if (count($value->translations) > 0) {
                $cred = [
                    $value->key => $value->translations[0]['value'],
                ];
                array_push($data, $cred);
            } else {
                $cred = [
                    $value->key => $value->value,
                ];
                array_push($data, $cred);
            }
        }
        $settings = [];
        foreach ($data as $single_data) {
            foreach ($single_data as $key => $single_value) {
                $settings[$key] = $single_value;
            }
        }
        // $settings =  DataSetting::with('translations')->where('type','admin_landing_page')->pluck('value','key')->toArray();
        $opening_time = BusinessSetting::where('key', 'opening_time')->first();
        $closing_time = BusinessSetting::where('key', 'closing_time')->first();
        $opening_day = BusinessSetting::where('key', 'opening_day')->first();
        $closing_day = BusinessSetting::where('key', 'closing_day')->first();
        $promotional_banners = AdminPromotionalBanner::get()->toArray();
        $features = AdminFeature::get()->toArray();
        $criterias = AdminSpecialCriteria::get();
        $testimonials = AdminTestimonial::get();

        $landing_data = [
            'fixed_header_title' => (isset($settings['fixed_header_title'])) ? $settings['fixed_header_title'] : null,
            'fixed_header_sub_title' => (isset($settings['fixed_header_sub_title'])) ? $settings['fixed_header_sub_title'] : null,
            'fixed_module_title' => (isset($settings['fixed_module_title'])) ? $settings['fixed_module_title'] : null,
            'fixed_module_sub_title' => (isset($settings['fixed_module_sub_title'])) ? $settings['fixed_module_sub_title'] : null,
            'fixed_referal_title' => (isset($settings['fixed_referal_title'])) ? $settings['fixed_referal_title'] : null,
            'fixed_referal_sub_title' => (isset($settings['fixed_referal_sub_title'])) ? $settings['fixed_referal_sub_title'] : null,
            'fixed_newsletter_title' => (isset($settings['fixed_newsletter_title'])) ? $settings['fixed_newsletter_title'] : null,
            'fixed_newsletter_sub_title' => (isset($settings['fixed_newsletter_sub_title'])) ? $settings['fixed_newsletter_sub_title'] : null,
            'fixed_footer_article_title' => (isset($settings['fixed_footer_article_title'])) ? $settings['fixed_footer_article_title'] : null,
            'feature_title' => (isset($settings['feature_title'])) ? $settings['feature_title'] : null,
            'feature_short_description' => (isset($settings['feature_short_description'])) ? $settings['feature_short_description'] : null,
            'earning_title' => (isset($settings['earning_title'])) ? $settings['earning_title'] : null,
            'earning_sub_title' => (isset($settings['earning_sub_title'])) ? $settings['earning_sub_title'] : null,
            'earning_seller_image' => (isset($settings['earning_seller_image'])) ? $settings['earning_seller_image'] : null,
            'earning_delivery_image' => (isset($settings['earning_delivery_image'])) ? $settings['earning_delivery_image'] : null,
            'why_choose_title' => (isset($settings['why_choose_title'])) ? $settings['why_choose_title'] : null,
            'download_user_app_title' => (isset($settings['download_user_app_title'])) ? $settings['download_user_app_title'] : null,
            'download_user_app_sub_title' => (isset($settings['download_user_app_sub_title'])) ? $settings['download_user_app_sub_title'] : null,
            'download_user_app_image' => (isset($settings['download_user_app_image'])) ? $settings['download_user_app_image'] : null,
            'testimonial_title' => (isset($settings['testimonial_title'])) ? $settings['testimonial_title'] : null,
            'contact_us_title' => (isset($settings['contact_us_title'])) ? $settings['contact_us_title'] : null,
            'contact_us_sub_title' => (isset($settings['contact_us_sub_title'])) ? $settings['contact_us_sub_title'] : null,
            'contact_us_image' => (isset($settings['contact_us_image'])) ? $settings['contact_us_image'] : null,
            'opening_time' => $opening_time ? $opening_time->value : null,
            'closing_time' => $closing_time ? $closing_time->value : null,
            'opening_day' => $opening_day ? $opening_day->value : null,
            'closing_day' => $closing_day ? $closing_day->value : null,
            'promotional_banners' => (isset($promotional_banners)) ? $promotional_banners : null,
            'features' => (isset($features)) ? $features : [],
            'criterias' => (isset($criterias)) ? $criterias : null,
            'testimonials' => (isset($testimonials)) ? $testimonials : null,



            'counter_section' => (isset($settings['counter_section'])) ? json_decode($settings['counter_section'], true) : null,
            'seller_app_earning_links' => (isset($settings['seller_app_earning_links'])) ? json_decode($settings['seller_app_earning_links'], true) : null,
            'dm_app_earning_links' => (isset($settings['dm_app_earning_links'])) ? json_decode($settings['dm_app_earning_links'], true) : null,
            'download_user_app_links' => (isset($settings['download_user_app_links'])) ? json_decode($settings['download_user_app_links'], true) : null,
            'fixed_link' => (isset($settings['fixed_link'])) ? json_decode($settings['fixed_link'], true) : null,
        ];


        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            $review = AdminTestimonial::where('status', 1)->get();
            $category = Category::where('status', 1)->where('featured', 1)->get();

            $item = Item::where('status', 1)->get();

            // dd($item);

            return view('home', compact('landing_data', 'item', 'category', 'review'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }



    public function terms_and_conditions(Request $request)
    {
        $data = self::get_settings('terms_and_conditions');
        if ($request->expectsJson()) {
            if ($request->hasHeader('X-localization')) {
                $current_language = $request->header('X-localization');
                $data = self::get_settings_localization('terms_and_conditions', $current_language);
                return response()->json($data);
            }
            return response()->json($data);
        }
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            return view('terms-and-conditions', compact('data'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public function about_us(Request $request)
    {
        $data = self::get_settings('about_us');
        $data_title = self::get_settings('about_title');
        if ($request->expectsJson()) {
            if ($request->hasHeader('X-localization')) {
                $current_language = $request->header('X-localization');
                $data = self::get_settings_localization('about_us', $current_language);
                return response()->json($data);
            }
            return response()->json($data);
        }
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            return view('about-us', compact('data', 'data_title'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public function contact_us()
    {
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            return view('contact-us');
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public function send_message(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Message sent successfully!');
        return back();
    }

    public function privacy_policy(Request $request)
    {
        $data = self::get_settings('privacy_policy');
        if ($request->expectsJson()) {
            if ($request->hasHeader('X-localization')) {
                $current_language = $request->header('X-localization');
                $data = self::get_settings_localization('privacy_policy', $current_language);
                return response()->json($data);
            }
            return response()->json($data);
        }
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        // dd($data);
        if (isset($config) && $config) {
            return view('privacy-policy', compact('data'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public function refund_policy(Request $request)
    {
        $data = self::get_settings('refund_policy');
        $status = self::get_settings_status('refund_policy_status');
        if ($request->expectsJson()) {
            if ($request->hasHeader('X-localization')) {
                $current_language = $request->header('X-localization');
                $data = self::get_settings_localization('refund_policy', $current_language);
                return response()->json($data);
            }
            return response()->json($data);
        }
        abort_if($status == 0, 404);
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            return view('refund', compact('data'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public function shipping_policy(Request $request)
    {
        $data = self::get_settings('shipping_policy');
        $status = self::get_settings_status('shipping_policy_status');
        if ($request->expectsJson()) {
            if ($request->hasHeader('X-localization')) {
                $current_language = $request->header('X-localization');
                $data = self::get_settings_localization('shipping_policy', $current_language);
                return response()->json($data);
            }
            return response()->json($data);
        }
        abort_if($status == 0, 404);
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            return view('shipping-policy', compact('data'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public function cancelation(Request $request)
    {
        $data = self::get_settings('cancellation_policy');
        $status = self::get_settings_status('cancellation_policy_status');
        if ($request->expectsJson()) {
            if ($request->hasHeader('X-localization')) {
                $current_language = $request->header('X-localization');
                $data = self::get_settings_localization('cancellation_policy', $current_language);
                return response()->json($data);
            }
            return response()->json($data);
        }
        abort_if($status == 0, 404);
        $config = Helpers::get_business_settings('landing_page');
        $landing_integration_type = Helpers::get_business_data('landing_integration_type');
        $redirect_url = Helpers::get_business_data('landing_page_custom_url');

        if (isset($config) && $config) {
            return view('cancelation', compact('data'));
        } elseif ($landing_integration_type == 'file_upload' && File::exists('resources/views/layouts/landing/custom/index.blade.php')) {
            return view('layouts.landing.custom.index');
        } elseif ($landing_integration_type == 'url') {
            return redirect($redirect_url);
        } else {
            abort(404);
        }
    }

    public static function get_settings($name)
    {
        $config = null;
        $data = DataSetting::where(['key' => $name])->first();
        return $data ? $data->value : '';
    }

    public static function get_settings_localization($name, $lang)
    {
        $config = null;
        $data = DataSetting::withoutGlobalScope('translate')->with([
            'translations' => function ($query) use ($lang) {
                return $query->where('locale', $lang);
            }
        ])->where(['key' => $name])->first();
        if ($data && count($data->translations) > 0) {
            $data = $data->translations[0]['value'];
        } else {
            $data = $data ? $data->value : '';
        }
        return $data;
    }

    public static function get_settings_status($name)
    {
        $data = DataSetting::where(['key' => $name])->first()?->value;
        return $data;
    }

    public function lang($local)
    {
        $direction = BusinessSetting::where('key', 'site_direction')->first();
        $direction = $direction->value ?? 'ltr';
        $language = BusinessSetting::where('key', 'system_language')->first();
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] == $local) {
                $direction = isset($data['direction']) ? $data['direction'] : 'ltr';
            }
        }
        session()->forget('landing_language_settings');
        Helpers::landing_language_load();
        session()->put('landing_site_direction', $direction);
        session()->put('landing_local', $local);
        return redirect()->back();
    }

    public function product_detail($slug)
    {

        $items = Item::where('slug', $slug)->with('stations')->first();
        $product = Item::all();

        if ($items != null) {
            return view('product.product_detail', compact('items', 'product'));
        }
    }

    public function payment($slug, Request $request)
    {
        $userId = auth()->id(); // Retrieve the authenticated user's ID

        $user = User::with('userkyc')->find($userId);

        if ($user) {
            $items = Item::where('slug', $slug)->first();
            $selectedStation = $request->input('available_stations');

            $station = Station::where('id', $selectedStation)->first();

            if ($items) {
                return view('payment', compact('items', 'station'));
            }
        }


        // Add a fallback return if no conditions are met
        return redirect()->route('home')->with('error', 'User not authenticated or KYC not found');
    }




    public function product($category_id)
    {
        $products = Item::where('category_id', $category_id)->get();
        // Assuming you have a Category model and want to retrieve the category name
        $category = Category::findOrFail($category_id);

        return view('productlisting', compact('products', 'category'));
    }

    public function all_category()
    {
        $category = Category::all();
        return view('all_category', compact('category'));
    }

    public function safety()
    {
        return view('safety');
    }

    public function rental_bike(Request $request)
    {
        $categories = Category::all();
        $query = Item::where('status', 1);

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $items = $query->get();


        return view('rental_bike', compact('items', 'categories'));
    }

    public function getCategoryProducts(Request $request)
    {

        $categories = Category::all();

        $categoryId = $request->get('category_id');
        $item = Item::where('category_id', $categoryId)->where('status', 1)->get();
        return view('product_card', compact('item', 'categories'));

        // $responseHtml = '';

        // $responseHtml .= view('product_card', ['item' => $items])->render();

        // dd(  $responseHtml);
        // return response()->json($responseHtml);
    }

    public function sortProducts(Request $request)
    {
        $categories = Category::all();
        $sortOption = $request->input('sort_option');
        if ($sortOption == 'low_to_high') {
            $item = Item::orderBy('price', 'asc')->get();
        } else {
            $item = Item::orderBy('price', 'desc')->get();
        }
        return view('product_card', compact('item', 'categories'));
    }

    public function create_order_store(Request $request)
    {
        try {
            Log::info("Received request data: ", $request->all());


            $customer_address = collect([
                'contact_person_name' => Auth::user()->f_name,
                'contact_person_number' => Auth::user()->phone,
                'contact_person_email' => Auth::user()->email,
                "address_type" => "Delivery",
                "address" => $request->input('address'),
                "road" => "",
                "house" => "",
                "longitude" => $request->input('lng'),
                "latitude" => $request->input('lat')
            ]);

            // Create the order
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->delivery_address = $customer_address;
            $order->store_id = $request->input('store_id');
            $order->order_status = 'confirmed';
            $order->order_amount = $request->input('order_amount');
            $order->payment_status = strtolower($request->payment_status);
            $order->transaction_reference = $request->input('transaction_reference');
            $order->save();

            // Create the order detail if the order is successfully created
            if ($order->user_id == Auth::user()->id) {
                Log::info("Order created successfully with ID: " . $order->id);

                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->item_id = $request->input('item_id');
                $orderDetail->price = $request->input('order_amount');
                $orderDetail->distance = $request->input('distance');
                $orderDetail->start_date = $request->input('start_date');
                $orderDetail->end_date = $request->input('end_date');
                $orderDetail->unit_price = $request->input('unit_price');
                $orderDetail->weekend_price = $request->input('weekend_price');
                $orderDetail->save();

                if (isset($order->transaction_reference)) {
                    $order_payment = new OrderPayment();
                    $order_payment->order_id = $order->id;
                    $order_payment->transaction_ref = $request->input('transaction_reference');
                    $order_payment->amount = $request->input('order_amount');
                    $order_payment->payment_status = $request->payment_status;
                    $order_payment->payment_method = "Razorpay";
                    $order_payment->save();
                }
            }

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            Log::error('An error occurred while processing the order:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['success' => false, 'error' => 'An error occurred while processing your request.']);
        }
    }

    public function thank_you()
    {
        return view('thankyou');
    }

    // public function rides(Request $request) 
    // {
    //     $user_id = Auth::user()->id;
    //     $orders = Order::where('user_id', $user_id)->with('details')->get();

    //     // Check if any orders are retrieved
    //     if ($orders->isNotEmpty()) {
    //         // Iterate through each order to extract item details
    //         $orders->each(function ($order) {
    //             $items = $order->details->map(function ($detail) {
    //                 return $detail->item;
    //             });

    //             // Append the items to the order object
    //             $order->items = $items;
    //         });
    //     }

    //     return view('rides', compact('orders'));
    // }

    public function rides(Request $request)
    {

        $user_id = Auth::user()->id;

        $user = User::with('userkyc')->find($user_id);
        $orders = Order::where('user_id', $user_id)
            ->with('details')
            ->orderBy('created_at', 'desc') // Order by created date in descending order
            ->get();

        // Check if any orders are retrieved
        if ($orders->isNotEmpty()) {
            // Iterate through each order to extract item details
            $orders->each(function ($order) {
                $items = $order->details->map(function ($detail) {
                    return $detail->item;
                });

                // Append the items to the order object
                $order->items = $items;
            });
        }

        return view('rides', compact('orders', 'user'));
    }

    public function invoice($id){
        $order = Order::withOutGlobalScope(ZoneScope::class)->with([
            'details',
            'store' => function ($query) {
                return $query->withCount('orders');
            },
            'details.item' => function ($query) {
                return $query->withoutGlobalScope(StoreScope::class);
            },
            'details.campaign' => function ($query) {
                return $query->withoutGlobalScope(StoreScope::class);
            }
        ])->where('id', $id)->first();

        $details = json_decode($order->details, true);
        $orderDetails = $details;

        // Extract weekend price
        $weekendPrice = $details[0]['weekend_price'] ?? null;

        $item = $order->details->first()->item;

        // Decode JSON fields from item properties
        $dayPrice = json_decode($item->days_price, true) ?? ['price' => 0];
        $weekPrice = json_decode($item->week_price, true) ?? 0;
        $monthPrice = json_decode($item->month_price, true) ?? 0;
        $hourPrice = json_decode($item->hours_price, true) ?? ['price' => 0];

        $startDateTime = Carbon::parse($details[0]['start_date']);
        $endDateTime = Carbon::parse($details[0]['end_date']);
        $durationHours = $endDateTime->diffInHours($startDateTime);

        // Determine the pricing based on duration
        $totalPrice = 0;
        $type = '';

        if ($durationHours <= 23) {
            $totalPrice = $hourPrice['km_charges'] ?? 0;
            $type = "hour";
        } elseif ($durationHours <= 7 * 24) { // 7 days
            $totalPrice = $dayPrice['km_charges'] ?? 0;
            $type = "day";
        } elseif ($durationHours <= 30 * 24) { // 30 days (approximately 1 month)
            $totalPrice = $weekPrice['km_charges'] ?? 0;
            $type = "week";
        } else {
            $totalPrice = $monthPrice['km_charges'] ?? 0;
            $type = "month";
        }
        return view('invoice', compact('order', 'weekendPrice', 'type', 'totalPrice', 'orderDetails'));
    }

    public function print_invoice($id)
    {
        $order = Order::withOutGlobalScope(ZoneScope::class)->with([
            'details',
            'store' => function ($query) {
                return $query->withCount('orders');
            },
            'details.item' => function ($query) {
                return $query->withoutGlobalScope(StoreScope::class);
            },
            'details.campaign' => function ($query) {
                return $query->withoutGlobalScope(StoreScope::class);
            }
        ])->where('id', $id)->first();

        $details = json_decode($order->details, true);
        $orderDetails = $details;

        // Extract weekend price
        $weekendPrice = $details[0]['weekend_price'] ?? null;

        $item = $order->details->first()->item;

        // Decode JSON fields from item properties
        $dayPrice = json_decode($item->days_price, true) ?? ['price' => 0];
        $weekPrice = json_decode($item->week_price, true) ?? 0;
        $monthPrice = json_decode($item->month_price, true) ?? 0;
        $hourPrice = json_decode($item->hours_price, true) ?? ['price' => 0];

        $startDateTime = Carbon::parse($details[0]['start_date']);
        $endDateTime = Carbon::parse($details[0]['end_date']);
        $durationHours = $endDateTime->diffInHours($startDateTime);

        // Determine the pricing based on duration
        $totalPrice = 0;
        $type = '';

        if ($durationHours <= 23) {
            $totalPrice = $hourPrice['km_charges'] ?? 0;
            $type = "hour";
        } elseif ($durationHours <= 7 * 24) { // 7 days
            $totalPrice = $dayPrice['km_charges'] ?? 0;
            $type = "day";
        } elseif ($durationHours <= 30 * 24) { // 30 days (approximately 1 month)
            $totalPrice = $weekPrice['km_charges'] ?? 0;
            $type = "week";
        } else {
            $totalPrice = $monthPrice['km_charges'] ?? 0;
            $type = "month";
        }
        // return view('invoice', compact('order', 'weekendPrice', 'type', 'totalPrice', 'orderDetails'));
        return view('admin-views.order.invoice-print',compact('order', 'weekendPrice', 'type', 'totalPrice', 'orderDetails'))->render();
    }

    public function reviewStore(Request $request)
    {
        // $request->validate([
        //     'product_id' => 'required|exists:products,id',
        //     'rating' => 'required|integer|min:1|max:5',
        //     'comment' => 'nullable|string',
        // ]);

        dd($request->all());

        Review::create([
            'item_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'module_id' => '1',
        ]);

        return response()->json(['success' => 'Review submitted successfully']);
    }

}