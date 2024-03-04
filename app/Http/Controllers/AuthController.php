<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('posts');
        } else {
            return redirect('login')->with('error_message', 'Wrong email or password. Please try again.');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function register_form(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
            // 'password' => bcrypt($request->input('password'))
        ]);

        return redirect('login')->with('success_message', 'Your account has been created. Please login.');
    }


}


