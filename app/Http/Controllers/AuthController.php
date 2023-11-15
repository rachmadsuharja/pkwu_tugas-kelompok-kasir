<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            "username"=> "required",
            "password"=> "required"
        ]);

        $credentials = $request->only('shift','username', 'password');
        $userExists = User::where('username', $request->username)->exists();
        if ($userExists) {
            if (Auth::attempt($credentials)) {
                return to_route('dashboard');
            } else {
                return to_route('login')->withErrors(['password' => 'Shift / Password Salah'])->withInput()->with('alert-type','error');
            }
        }
        return to_route('login')->withErrors(['email' => 'Akun tidak terdaftar'])->withInput()->with('alert-type', 'error');
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
