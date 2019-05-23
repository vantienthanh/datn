<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/store'], function (Router $router) {
    $router->bind('store', function ($id) {
        return app('Modules\Store\Repositories\StoreRepository')->find($id);
    });
    $router->get('stores', [
        'as' => 'admin.store.store.index',
        'uses' => 'StoreController@index',
        'middleware' => 'can:store.stores.index'
    ]);
    $router->get('stores/create', [
        'as' => 'admin.store.store.create',
        'uses' => 'StoreController@create',
        'middleware' => 'can:store.stores.create'
    ]);
    $router->post('stores', [
        'as' => 'admin.store.store.store',
        'uses' => 'StoreController@store',
        'middleware' => 'can:store.stores.create'
    ]);
    $router->get('stores/{store}/edit', [
        'as' => 'admin.store.store.edit',
        'uses' => 'StoreController@edit',
        'middleware' => 'can:store.stores.edit'
    ]);
    $router->put('stores/{store}', [
        'as' => 'admin.store.store.update',
        'uses' => 'StoreController@update',
        'middleware' => 'can:store.stores.edit'
    ]);
    $router->delete('stores/{store}', [
        'as' => 'admin.store.store.destroy',
        'uses' => 'StoreController@destroy',
        'middleware' => 'can:store.stores.destroy'
    ]);
// append

});
