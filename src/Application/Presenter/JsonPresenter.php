<?php

namespace SRC\Application\Presenter;

use PlugHttp\Response;

class JsonPresenter
{
    private $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function json($body, $code = 200)
    {
        if (!is_array($body)) {
            $body = [$body];
        }
        return $this->response
            ->setStatusCode($code)
            ->response()
            ->json($body);
    }
}