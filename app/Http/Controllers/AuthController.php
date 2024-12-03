<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            if ($request->input('remember')) {
                Auth::shouldUse('web');
            }
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'These credentials do not match our records.']);

    }

    public function userCreate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return back()->with('success', 'User created successfully');

    }
}
