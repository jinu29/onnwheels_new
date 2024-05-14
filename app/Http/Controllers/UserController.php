<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userkyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userprofile() {
        $user=User::where('id',Auth::user()->id)->first();
        $user_kyc=Userkyc::first();
        // $user_key=Userkyc::where('id',$id)->first();
        return view('userprofile',compact('user','user_kyc'));
    }
}
