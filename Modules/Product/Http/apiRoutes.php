<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 23/05/2019
 * Time: 18:23
 */
use Illuminate\Routing\Router;
/** @var Router $router */

$router->post('products/ajax', [
    'as' => 'ajax.product.detail',
    'uses' => 'ProductAjaxController@productDetail'
]);
$router->get('products/ajax/30days', [
    'as' => 'ajax.bill.30day',
    'uses' => 'ProductAjaxController@tk_30_day'
]);