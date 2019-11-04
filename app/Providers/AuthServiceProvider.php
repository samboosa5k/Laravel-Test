<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Review;
use App\Movie;

use Laravel\Passport\Passport;

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

        Passport::routes();

        Gate::define('admin', function ($user) {
            dd($user);
            // return $user->id == 2;
            return true; // Everyone allowed, disable and enable the above later
        });

        Gate::define('create_review', function ($user, $movie) {
            Review::where('user_id', $user->id)->where('movie_id', $movie->id)->count() == 0;
        });
    }
}
