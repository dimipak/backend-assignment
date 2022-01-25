<?php

namespace App\Providers;

use App\Traits\JResponse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    use JResponse;

    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    protected string $apiV1VesselsApi = 'App\Http\Controllers\v1\Vessels';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->mapApiV1VesselsRoutes();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('ip_address', function (Request $request) {
            return Limit::perHour(config('marinetraffic.limit_requests_per_hour'))->by($request->ip())->response(function() {
                throw new \Exception('Too many requests', 429);
            });
        });
    }

    /**
     * @return void
     */
    protected function mapApiV1VesselsRoutes()
    {
        Route::prefix('v1/vessels/')
            ->middleware('api')
            ->name('api.v1.vessels.')
            ->namespace($this->apiV1VesselsApi)
            ->group(base_path('routes/v1/api.php'));
    }
}
