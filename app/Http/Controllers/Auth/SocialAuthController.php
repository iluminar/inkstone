<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $provider = Route::current()->provider;
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/' . $provider);
        }

        $authUser = $this->findOrCreateUser($provider, $user);

        Auth::login($authUser, true);

        return Redirect::to(Request::server('HTTP_REFERER'));
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $providerUser
     * @return User
     */
    private function findOrCreateUser($provider, $providerUser)
    {
        if ($authUser = Social::where(['provider_id' => $providerUser->id, 'provider' => $provider])->first()) {
            return $authUser->user;
        }
        if ($user = User::where(['email' => $providerUser->email])->first()) {
            $this->createNewSocialAccount($provider, $providerUser, $user);

            return $user;
        }
        $user = User::create([
            'name' => $providerUser->name,
            'username' => ($providerUser->nickname == "") ? str_slug($providerUser->name, '-') : $providerUser->nickname,
            'email' => $providerUser->email
        ]);
        $this->createNewSocialAccount($provider, $providerUser, $user);

        return $user;
    }

    /**
     * create new social account
     * @param $provider
     * @param $providerUser 
     * @param $user
     * @return void
     */
    private function createNewSocialAccount($provider, $providerUser, $user)
    {
        Social::create([
            'provider' => $provider,
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'user_id' => $user->id,
            'provider_id' => $providerUser->id,
            'avatar' => $providerUser->avatar
        ]);
    }
}
