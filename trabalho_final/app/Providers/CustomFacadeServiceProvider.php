<?php

namespace App\Providers;

use App\Facades\UserPermissions;
use Illuminate\Support\ServiceProvider;

class CustomFacadeServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        
        $this->app->bind('userpermissions', function() {
            return new UserPermissions();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
