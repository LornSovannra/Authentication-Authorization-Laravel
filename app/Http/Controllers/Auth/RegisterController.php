<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function ShowRegisterForm()
    {
        if(Auth::check())
        {
            return redirect("/");
        }
        return view("auth.register");
    }

    public function Register(Request $req)
    {
        $this->validate($req, [
            'name' => ["required", "min:3", "max:100"],
            'email' => ["required", "min:3", "max:100", "unique:users"],
            'password' => ["required", "min:3", "max:100", "confirmed"],
            'password_confirmation' => ["required"]
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        if($user){
            $credential = $req->only(['email', 'password']);

            if(Auth::attempt($credential))
            {
                return redirect("/");
            }
        }
    }
}
