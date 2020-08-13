<?php

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$dependecies = require_once 'dependencies.php';

$route->options('/{anything}', function () {
    return '';
});

$route->group(['prefix' => '/', 'namespace' => 'SRC\Application\Controller'], function ($route) {
    $route->get('brands', '\\BrandFindAll@findAll');

    $route->post('brands', '\\BrandCreate@handler');

    $route->put('brands/{id:\d+}', '\\BrandUpdate@update');

    $route->delete('brands/{id:\d+}', '\\BrandDelete@delete');

    $route->get('brands/{id:\d+}', '\\BrandFind@findById');
});


$route->on($dependecies);