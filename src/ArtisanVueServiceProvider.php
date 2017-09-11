<?php

namespace ChrisBraybrooke\ArtisanVue;

use Illuminate\Support\ServiceProvider;
use ChrisBraybrooke\ArtisanVue\Commands\MakeVueComponent;

class HtmlServiceProvider extends ServiceProvider
{

  /**
   * Register bindings in the container.
   *
   * @return void
   */
    public function register()
    {
        $this->app->singleton(ArtisanVue::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeVueComponent::class,
            ]);
        }
    }

}
