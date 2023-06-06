<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check() && Auth::user()->is_admin == 1))
        {
            return redirect('/admin/dashboard');
        }
        return view('login');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['name' => $request -> name,'password' => $request -> password,'is_admin' => 1], $remember))
    {
        return redirect('/admin/dashboard');
    }
    else
    {
        return redirect()->back()->with('message', "Złe dane");
    }
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('/admin');
    }
}
