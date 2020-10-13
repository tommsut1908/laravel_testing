<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\SocialFacebookAccount;

class FacebookLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
        $providerUser = Socialite::driver('facebook')->user();
        $user_id = $this->createOrGetUser($providerUser);
        Auth::loginUsingId($user_id, true);
        return redirect('')->with('status',"Login Success");
    }

    public function createOrGetUser($providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user_id;
        } else {
            $account = new SocialFacebookAccount([
                'name' => $providerUser->getName(),
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $account->save();
            return $account->user_id;
        }
    } 
}
