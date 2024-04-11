<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
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
        //
        if($this->app->environment('production')){
            URL::forceScheme('https');
        }

        if (!File::exists(public_path('storage'))) {
            // Obtiene la ruta relativa desde public a storage/app/public
            $relativePath = '../../storage/app/public';
            // Crea el enlace simbólico
            File::link(storage_path('app/public'), public_path('storage', $relativePath));
        }
    }
}
