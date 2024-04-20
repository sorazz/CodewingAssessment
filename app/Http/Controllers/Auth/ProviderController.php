<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'provider_id' => $socialUser->id,
            'provider' => $provider
        ], [
            'name' => $socialUser->name ? $socialUser->name : $socialUser->nickname,
            'email' => $socialUser->email ? $socialUser->email : 'user' . $socialUser->id . '@gmail',
            'provider_token' => $socialUser->token,
            'password' => Str::random(6),
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }
}
