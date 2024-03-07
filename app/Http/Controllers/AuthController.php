<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitLoginRequest;
use App\Http\Requests\SubmitRegisterRequest;
use App\Models\User;
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

    public function showRegister()
    {
        return view('auth.register');
    }

    public function submitRegister(SubmitRegisterRequest $request)
    {
        User::query()
            ->create($request->validated());

        return redirect()->route('login.show')
            ->with(['success' => 'User registered successfully']);
    }
}
