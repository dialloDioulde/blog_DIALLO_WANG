<?php

namespace App\Services;
use App\Role;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);


                $userRole = Role::where('name','user')->first();

                $user->roles()->attach($userRole);
            }


            $account->user()->associate($user);

            $account->save();

            return $user;
        }
    }
}
