<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Cette fonction permet de désigner les rôles qui auront le droit d'acceder et de manipuler la liste des utilisateurs
        Gate::define('gestion-users', function ($user) {
            return $user->hasAnyRole(['admin','user']);
        });


        // Cette fonction permet uniquement à un admin de modifier un ou des utilisateur(s)
        Gate::define('edit-users', function ($user) {
            return $user->hasAnyRole(['admin']);
        });

        // Cette fonction permet uniquement à un admin de supprimer un ou des utilisateur(s)
        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });


        //
    }
}
