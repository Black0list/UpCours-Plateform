<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthRepositoryInterface $auth)
    {
        $this->auth = $auth;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string'
        ]);

        $this->auth->register($validated);
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = $this->auth->login($data);

        if (!$user) {
            return redirect()->back()->with('failed', 'The Email or the password is incorrect');
        }

        return redirect('/profile');
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect('/');
    }

    public function profile()
    {
        $user = $this->auth->profile();
        return view('global.profile', compact('user'));
    }
}
