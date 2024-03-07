<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function submitLogin(SubmitLoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('posts.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
