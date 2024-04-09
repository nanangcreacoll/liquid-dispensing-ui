<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
{
    public function loginView()
    {
        return view("login");
    }

    public function register(UserRegisterRequest $request): UserResource
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource($user);
    }

    public function loginAuth(UserLoginRequest $request): RedirectResponse
    {        
        $credentials = $request->validated();

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
