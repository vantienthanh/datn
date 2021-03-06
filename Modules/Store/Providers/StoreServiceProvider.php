<?php

namespace Modules\Store\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Store\Events\Handlers\RegisterStoreSidebar;

class StoreServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterStoreSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('stores', array_dot(trans('store::stores')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('store', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Store\Repositories\StoreRepository',
            function () {
                $repository = new \Modules\Store\Repositories\Eloquent\EloquentStoreRepository(new \Modules\Store\Entities\Store());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Store\Repositories\Cache\CacheStoreDecorator($repository);
            }
        );
// add bindings

    }
}
