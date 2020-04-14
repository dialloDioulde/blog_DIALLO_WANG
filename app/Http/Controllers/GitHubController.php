<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Validator,Redirect,Response,File;
use App\User;
class GitHubController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $userInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($userInfo,$provider);

        auth()->login($user);

        return redirect()->to('/home');

    }
    function createUser($userInfo,$provider){

        $userGit = User::where('provider_id', $userInfo->id)->first();

        if (!$userGit) {
            $user = User::create([
                'name'     => $userInfo->name,
                'email'    => $userInfo->email,
                'provider' => $provider,
                'provider_id' => $userInfo->id,
            ]);

            $userRole = Role::where('name','user')->first();

            $user->roles()->attach($userRole);
        }
        return $userGit;
    }
}
