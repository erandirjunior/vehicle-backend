<?php

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$dependecies = require_once 'dependencies.php';

$route->options('/{anything}', function () {
    return '';
});

$route->get('/generate-token', function (\PlugRoute\Http\Response $response) {
    $key = "token_key";
    $payload = array(
        "iss" => "http://localhost:8081",
        "iat" => time(),
        "exp" => time() + 43200
    );

    $jwt = \Firebase\JWT\JWT::encode($payload, $key);

    echo $response->json([$jwt]);
});

$route->get('/access', function (\PlugRoute\Http\Request $request, \PlugRoute\Http\Response $response) {
    echo $response->setStatusCode(400)
        ->response()
        ->json(["You don't have permission!"]);
})->name('access');

$route->group(['prefix' => '/', 'namespace' => 'SRC\Application\Controller'], function ($route) {
    $route->group(['middlewares' => [\SRC\Application\Middleware\AuthMiddleware::class]], function ($route) {
        $route->group(['namespace' => '\\Brand'], function ($route) {
            $route->get('brands', '\\BrandFindAll@handler');

            $route->post('brands', '\\BrandCreate@handler');

            $route->put('brands/{id:\d+}', '\\BrandUpdate@handler');

            $route->delete('brands/{id:\d+}', '\\BrandDelete@handler');

            $route->get('brands/{id:\d+}', '\\BrandFind@handler');
        });

        $route->group(['namespace' => '\\Model'], function ($route) {
            $route->get('models', '\\ModelFindAll@handler');

            $route->post('models', '\\ModelCreate@handler');

            $route->put('models/{id:\d+}', '\\ModelUpdate@handler');

            $route->delete('models/{id:\d+}', '\\ModelDelete@handler');

            $route->get('models/{id:\d+}', '\\ModelFind@handler');
        });
    });
});

$route->on($dependecies);