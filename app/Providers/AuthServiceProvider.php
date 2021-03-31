<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Inventaris' => 'App\Policies\InventarisPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-inv', function($user){

            return in_array($user->id_level, [1, 2, 3]);
            // return $user->id_level === 1;
            // return $user->id_level === 2;
            // return $user->id_level === 3;
        });

        Gate::define('add-inv', function($user){
            return in_array($user->id_level, [1]);
        });

        Gate::define('employee-stuff', function($user){
            return in_array($user->id_level, [1, 2]);
        });


        Gate::define('edit-inv', function($user){
            return in_array($user->id_level, [1, 2]);
        });
        // Gate::define('-inv', function($user){
        //     return in_array($user->id_level, [1, 2]);
        // });

    }
}
