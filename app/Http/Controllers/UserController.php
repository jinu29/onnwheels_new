<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userkyc;
use Defuse\Crypto\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function userprofile($id) {
    //     $user=User::first();
    //     $user_kyc=Userkyc::first();
    //     // $user_key=Userkyc::where('id',$id)->first();
    //     return view('userprofile',compact('user','user_kyc'));
    // }

    public function profile() {
        $userId = auth()->id();
        $user = User::with('userkyc')->find($userId);

        return view('profile',compact('user'));
    }

    // public function userkyc_store (Request $request ,$id){

    //     if(Userkyc::where('user_id')->exists()){
    //         $user_kyc = Userkyc::findOrFail('user_id',$id)->first();
    //     }else{
    //         $user_kyc = new Userkyc();
    //     }
    //         $user_kyc->user_id = Auth::user()->id;
    //         $user_kyc->aadhar = $request->aadhar;
    //         $user_kyc->pan = $request->pan;
    //         if($request->has('license_front')){
    //             $image = $request->file('license_front');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('uploades/user/kyc'), $imageName);
    //             $user_kyc->license_front = "/uploades/user/kyc/".$imageName;
    //         }
    //         if($request->has('license_back')){
    //             $image = $request->file('license_back');
    //             $imageName = time() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('uploades/user/kyc'), $imageName);
    //             $user_kyc->license_back          = "/uploades/user/kyc/".$imageName;
    //         }
    //         $user_kyc->is_verified = "0";
    //         $user_kyc->save();


    //     return redirect()->route('home');
    // }
    public function userkyc_store(Request $request)
    {

        $user_id = Auth::user()->id;

        $user_kyc = Userkyc::where('user_id', $user_id)->first();

        if (!$user_kyc) {
            $user_kyc = new Userkyc();
            $user_kyc->user_id = $user_id;
        }

        $user_kyc->aadhar = $request->aadhar;
        $user_kyc->pan = $request->pan;

        if ($request->has('license_front')) {
            $image = $request->file('license_front');
            $imageName = time() . '_front.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/user/kyc'), $imageName);
            $user_kyc->license_front = "/uploads/user/kyc/" . $imageName;
        }

        if ($request->has('license_back')) {
            $image = $request->file('license_back');
            $imageName = time() . '_back.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/user/kyc'), $imageName);
            $user_kyc->license_back = "/uploads/user/kyc/" . $imageName;
        }

        $user_kyc->is_verified = "0";
        $user_kyc->is_reject = "0";

        $user_kyc->save();

        return redirect()->route('home');
    }
}
