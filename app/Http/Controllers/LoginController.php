<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'name' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function guest()
    {
        Auth::login(User::firstOrCreate([
            'email' => 'guest@liepocalypse.com',
        ], [
            'name' => 'Guest User',
            'password' => bcrypt('guest123'), // password dummy
        ]));

        return redirect('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'password' => bcrypt(Str::random(24)),
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
