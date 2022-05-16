<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function provider($name)
    {
       return Socialite::driver($name)->redirect();
    }

    public function providerCallback($name)
    {
        $user = Socialite::driver($name)->stateless()->user();
        $user = User::updateOrCreate([
            "email" => $user->getEmail()
        ], [
            "name" => $user->getName()?? $user->getNickname(),
            "password" => Hash::make(Str::random(10))
        ]);
        Auth::login($user, true);
        return redirect('/dashboard');
    }
}
