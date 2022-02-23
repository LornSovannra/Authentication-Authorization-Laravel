<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        if(Auth::check())
        {
            return redirect("/");
        }

        return view("auth.login");
    }

    public function Login(Request $req)
    {
        $credential = $req->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $remember = $req->filled("remember");
        if(Auth::attempt($credential, $remember)){
            return redirect("/");
        }else{
            return back();
        }
    }

    public function Logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();

        return redirect("/login");
    }
}