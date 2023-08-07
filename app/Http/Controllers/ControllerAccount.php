<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAccount extends Controller
{
    public function account() {
        return view('user.account.account');
    }
    public function profile_buyer() {
        $session = Session::get('email');
        $user = DB::table('users')->where('email', '=', $session)->get(); 
        return view('user.account.profile', compact('user'));
    }
}
