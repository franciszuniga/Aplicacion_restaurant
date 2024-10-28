<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ParcialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $configuracionparcial = json_decode(file_get_contents(config_path('parcial.json')), true);

        config()->set('parcialconfiguracion', $configuracionparcial);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
