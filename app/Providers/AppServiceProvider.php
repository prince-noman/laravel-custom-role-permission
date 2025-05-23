<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // For single role(admin)
        // Blade::if('admin', function () {
        //     return Auth::check() && Auth::user()->hasRole('admin');
        // }); 

        // For multiple roles
        Blade::if('role', function (...$roles) {
            return Auth::check() && Auth::user()->hasAnyRole($roles);
        });
    }
}
