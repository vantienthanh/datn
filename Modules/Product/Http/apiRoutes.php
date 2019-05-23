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