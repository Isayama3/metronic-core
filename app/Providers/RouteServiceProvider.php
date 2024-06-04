<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapWebRoutes();

            $this->mapAdminApiRoutes();
            $this->mapAdminWebRoutes();
            $this->mapAdminWebAuthRoutes();

            $this->mapUserApiAuthRoutes();
            $this->mapUserApiRoutes();
        });
    }

    public function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    public function mapAdminApiRoutes()
    {
        Route::prefix('admin/api')
            ->middleware([])
            ->namespace($this->namespace)
            ->name('api.v1.admin')
            ->group(base_path('routes/admin/api/api.php'));
    }

    public function mapAdminWebRoutes()
    {
        Route::prefix(LaravelLocalization::setLocale() . '/admin')
            ->middleware(['web', 'auth:admin', 'localizationRedirect', 'localeViewPath'])
            ->namespace($this->namespace . '\Admin')
            ->name('admin.')
            ->group(base_path('routes/admin/web/web.php'));
    }

    public function mapAdminWebAuthRoutes()
    {
        Route::prefix(LaravelLocalization::setLocale() . '/admin')
            ->middleware(['web', 'guest:admin', 'localizationRedirect', 'localeViewPath',])
            ->namespace($this->namespace . '\Admin\Auth')
            ->name('admin.')
            ->group(base_path('routes/admin/web/auth.php'));
    }

    public function mapUserApiRoutes()
    {
        Route::prefix('api/user')
            ->namespace($this->namespace . '\User')
            ->name('api.v1.user.')
            ->middleware(['localizationRedirect', 'localeViewPath'])
            ->group(base_path('routes/user/api/api.php'));
    }

    public function mapUserApiAuthRoutes()
    {
        Route::prefix('api/user')
            ->namespace($this->namespace . '\User\Auth')
            ->name('api.v1.user.')
            ->middleware(['guest:user-api', 'localizationRedirect', 'localeViewPath'])
            ->group(base_path('routes/user/api/auth.php'));
    }
}
