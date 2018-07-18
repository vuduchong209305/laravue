<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function handleProviderCallback()
    {
        $user = Socialite::driver($provider)->user();
        dd($user);
    }
}
