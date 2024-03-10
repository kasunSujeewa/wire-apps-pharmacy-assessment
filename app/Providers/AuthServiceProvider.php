<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /* define a admin user role */
        Gate::define('isOwner', function($user) {
            return $user->role == 'Owner';
         });
        
         /* define a manager user role */
         Gate::define('isManager', function($user) {
             return $user->role == 'Manager';
         });
       
         /* define a user role */
         Gate::define('isCashier', function($user) {
             return $user->role == 'Cashier';
         });
    }
}
