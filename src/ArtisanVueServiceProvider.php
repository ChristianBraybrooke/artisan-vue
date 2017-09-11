<?php

namespace ChrisBraybrooke\ArtisanVue;

use Illuminate\Support\ServiceProvider;
use ChrisBraybrooke\ArtisanVue\Commands\MakeVueComponent;

class ArtisanVueServiceProvider extends ServiceProvider
{

  /**
   * Register bindings in the container.
   *
   * @return void
   */
    public function register()
    {
        $this->app->singleton(ArtisanVue::class);

        $this->mergeConfigFrom(
            __DIR__.'/config/artisan-vue.php', 'artisan-vue'
        );

    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

      $this->publishes([
          __DIR__.'/config/artisan-vue.php' => config_path('artisan-vue.php'),
      ]);

      if ($this->app->runningInConsole()) {
          $this->commands([
              MakeVueComponent::class,
          ]);
      }

    }

}
