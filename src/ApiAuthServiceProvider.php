<?php

namespace Coolcode\AuthApi;

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
    }
}
