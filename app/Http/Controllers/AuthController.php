<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware(['guest']);
    // }

    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 
            'password' => 'required' 
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('home');
    }

    public function storeSignup(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username|regex:/^\S*$/u',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed' 
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
