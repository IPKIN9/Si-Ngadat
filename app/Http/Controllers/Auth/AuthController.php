<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.Login');
    }

    public function check(AuthRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect(route('home.index'));
        }
        return redirect()->back()->with('status', 'Username dan Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
