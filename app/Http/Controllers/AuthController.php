<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login
    public function login_view()
    {
        return view('auth.login');
    }

    public function login_auth(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email harus diisi.',
                'password.required' => 'Password harus diisi.',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toastr()->success('Selamat datang, ' . Auth::user()->name);
            return redirect()->intended('dashboard');
        }
        toastr()->error('Email atau password salah.');
        return back();
    }

    // End Login

    // Register
    public function register_view()
    {
        return view('auth.register');
    }

    public function register_auth(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8',],
            ],
            [
                'name.required' => 'Nama lengkap harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal 8 karakter.',

            ]
        );
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        toastr()->success('Akun berhasil dibuat, silahkan login.');
        return redirect()->route('login');
        // End Register
    }
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
