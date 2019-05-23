<?php

namespace Modules\Bill\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Bill\Events\Handlers\RegisterBillSidebar;

class BillServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterBillSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('bills', array_dot(trans('bill::bills')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('bill', 'permissions');

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
            'Modules\Bill\Repositories\BillRepository',
            function () {
                $repository = new \Modules\Bill\Repositories\Eloquent\EloquentBillRepository(new \Modules\Bill\Entities\Bill());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bill\Repositories\Cache\CacheBillDecorator($repository);
            }
        );
// add bindings

    }
}
