<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login_form()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('cart/list');
            
        }

        return redirect('login')
                        ->withErrors(['credintial' => 'The provided credentials do not match our records.'])
                        ->withInput();
    }


    public function signup_form()
    {
        return view('auth.sign_up');
    }
    public function signup(Request $request)
    {   

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
       
        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
