<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function loginView()
    {
        return view("login");
    }

    public function loginAuth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required', 'max:255']
        ]);

        if (Auth::attempt($credentials, $request->filled('remember-me'))) {
            $request->session()->regenerate();

            return redirect()->intended('kendali');
        }

        return redirect()->back()->with([
            'loginError' => 'Username atau password salah.',
        ]);
    }

    public function logoutAuth(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
