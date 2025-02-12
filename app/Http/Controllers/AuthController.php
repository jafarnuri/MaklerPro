<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.users.register');
    }

    public function postlogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.home');
        }

        return back()->withErrors([
            'email' => 'Email və ya şifrə yanlışdır.'
        ]);
    }

    public function postregister(RegisterRequest $request)
    {

        $user = User::create($request->all());

        auth()->login($user);

        return redirect()->route('admin.home');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
