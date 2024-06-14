<?php

namespace Roky\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider{
    /**
     * Register any application services.
    */
    public function register(): void
    {
        $this->app->bind('customerUpdate', function(){
            return new \Roky\Admin\Controllers\AdminController();
        });
    }

    /**
     * Bootstrap any application services.
    */
    public function boot(): void
    {
        // Route::middleware('api')->group(__DIR__.'/../Routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
    }
}
