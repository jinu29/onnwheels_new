<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userprofile() {
        $user=User::first();
        return view('userprofile',compact('user'));
    }
}
