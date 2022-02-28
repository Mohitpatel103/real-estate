<?php

namespace RefineriaWeb\RWRealEstate;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use RefineriaWeb\RWRealEstate\Console\Commands\SeedsCommand;

/**
 * Class RWRealEstateServiceProvider
 * @package RefineriaWeb\RWRealEstate
 */
class RWRealEstateServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutes();

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/rw-real-estate'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/rw-real-estate'),
        ], 'public');

        $this->loadCommands();
    }

    private function loadRoutes()
    {
        /** @var Router $router */
        $router = $this->app['router'];

        /**
         * Routes
         */
        $router->group([
            'namespace' => 'RefineriaWeb\RWRealEstate\Controllers\Backend',
            'prefix' => 'rw-real-estate',
            'as' => 'rw-real-estate.',
            'middleware' => ['web', 'auth']
        ], function () {
            require __DIR__ . '/routes/routes.php';
        });
    }

    /**
     * Load Commands
     */
    public function loadCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SeedsCommand::class,
            ]);
        }
    }
}
