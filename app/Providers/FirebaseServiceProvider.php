<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('firebase.auth', function ($app) {
            $factory = (new Factory)
                ->withServiceAccount(storage_path('app/firebase/firebaseCredential.json'));

            return $factory->createAuth();
        });

        $this->app->singleton('firebase.storage', function ($app) {
            $factory = (new Factory)
                ->withServiceAccount(storage_path('app/firebase/firebaseCredential.json'));

            return $factory->createStorage();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
