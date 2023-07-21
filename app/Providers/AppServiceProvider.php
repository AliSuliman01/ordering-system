<?php

namespace App\Providers;

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
        if (file_exists(__DIR__.'/migrations.json')) {
            $this->loadMigrationsFrom(json_decode(file_get_contents(__DIR__.'/migrations.json'), true));
        }

    }
}
