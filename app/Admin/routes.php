<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/settings', 'SettingController@index');
//    $router->get('/user', 'UserController@index');
    $router->get('setting', 'UserController@setting');
    $router->resource('users', 'UserController');
    $router->resource('movie', 'MovieController');
});
