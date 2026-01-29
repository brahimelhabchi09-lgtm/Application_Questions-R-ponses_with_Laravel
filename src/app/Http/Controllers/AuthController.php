<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ===================== LOGIN ===================== */

    public function login()
    {
        return view('auth.login');
    }

    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('questions.index');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.'
        ])->onlyInput('email');
    }

    /* ===================== REGISTER ===================== */

    public function register()
    {
        return view('auth.register');
    }

    public function submitRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('login');
    }

    /* ===================== LOGOUT ===================== */

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
