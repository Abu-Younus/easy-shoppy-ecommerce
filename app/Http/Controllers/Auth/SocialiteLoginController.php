<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialiteLoginController extends Controller
{
    protected $providers = [
        'github','facebook','google','twitter'
    ];

    //socialite login all function
    public function redirect($provider)
    {
        if( ! $this->isProviderAllowed($provider) ) {
            return $this->sendFailedResponse("{$provider} is not currently supported");
        }

        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }


    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$provider} provider.")
            : $this->loginOrCreateAccount($user, $provider);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->route('user.dashboard');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $provider)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'provider' => $provider,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => bcrypt(rand(11111111,99999999)),
            ]);

            $profile = new Profile();
            $profile->user_id = $user->id;

            $imageName = Carbon::now()->timestamp. '.' .$providerUser->getAvatar()->extension();
            Image::make($providerUser->getAvatar())->resize(200, 200)->save('assets/images/profile/'.$imageName);
            $profile->image = $imageName;

            $profile->save();
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($provider)
    {
        return in_array($provider, $this->providers) && config()->has("services.{$provider}");
    }
}
