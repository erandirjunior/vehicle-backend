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
    $route->get('brands', '\\BrandFindAll@handler');

    $route->post('brands', '\\BrandCreate@handler');

    $route->put('brands/{id:\d+}', '\\BrandUpdate@handler');

    $route->delete('brands/{id:\d+}', '\\BrandDelete@handler');

    $route->get('brands/{id:\d+}', '\\BrandFind@handler');
});


$route->on($dependecies);