<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Htpp\ViewComposers\MainLayoutComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.main', 'App\Http\ViewComposers\MainLayoutComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
