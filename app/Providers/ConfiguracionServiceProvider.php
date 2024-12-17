<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ConfiguracionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $configuracion = json_decode(file_get_contents(config_path('configuracion.json')), true);

        config()->set('configuracion', $configuracion);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Compartir la configuración con todas las vistas
        $configuracion = config('configuracion');
        
        // Registrar una vista compartida
        //Ahora, en cualquier vista de Blade, puedes acceder 
        //a esta configuración global utilizando {{ $configuracionGlobal }}.
        View::share('configuracionGlobal', $configuracion);
    }
}
