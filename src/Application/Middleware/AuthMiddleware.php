<?php

namespace SRC\Application\Middleware;

use PlugRoute\Http\Request;
use PlugRoute\Middleware\PlugRouteMiddleware;

/**
 * Class AuthMiddleware
 * @package SRC\Application\Middleware
 */
class AuthMiddleware implements PlugRouteMiddleware
{
    /**
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function handle($request): Request
    {
        try {
            $token = $request->header('HTTP_AUTHORIZATION');
            $key = "token_key";

            \Firebase\JWT\JWT::decode($token, $key, ['HS256']);

            $request->add('token', $token);
        } catch (\Exception $e) {
            return $request->redirectToRoute('access');
        }

        return $request;
    }
}