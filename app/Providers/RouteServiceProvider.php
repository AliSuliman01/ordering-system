<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }


    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::group(['prefix' => 'api'], function () {
            Route::group(['prefix' => 'v1'], function () {

                Route::middleware('api')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/api.php'));

                if (file_exists(__DIR__.'/routes.json')) {
                    $routeFiles = json_decode(file_get_contents(__DIR__.'/routes.json'), true);

                    foreach ($routeFiles as $routeFile) {
                        Route::middleware('api')
                            ->namespace($this->namespace)
                            ->group(base_path($routeFile));
                    }
                }
            });
        });
    }
}
