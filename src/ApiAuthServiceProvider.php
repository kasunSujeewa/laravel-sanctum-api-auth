<?php

namespace Coolcode\AuthApi;

use Coolcode\AuthApi\Http\Middleware\CustomSanctumMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApiAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Route::prefix('api')                
            ->middleware('api')             
            ->namespace('Coolcode\AuthApi') 
            ->group(__DIR__.'/../routes/api.php'); 

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('authapi', CustomSanctumMiddleware::class);
        
    }
}
