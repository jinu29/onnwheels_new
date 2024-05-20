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
        return view('profile');
    }

    public function userkyc_store (Request $request){
        $user_kyc = new Userkyc();
        $user_kyc->user_id = Auth::user()->id;
        $user_kyc->aadhar = $request->aadhar;
        $user_kyc->pan = $request->pan;
        if($request->has('license_front')){
            $image = $request->file('license_front');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploades/user/kyc'), $imageName);
            $user_kyc->license_front = "/uploades/user/kyc/".$imageName;
        }
        if($request->has('license_back')){
            $image = $request->file('license_back');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploades/user/kyc'), $imageName);
            $user_kyc->license_back          = "/uploades/user/kyc/".$imageName;
        }
        $user_kyc->is_verified = "0";
        $user_kyc->save();
        return redirect()->route('home');
    }
}
