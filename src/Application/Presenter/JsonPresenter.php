<?php

namespace SRC\Application\Presenter;

use PlugHttp\Response;

/**
 * Class JsonPresenter
 * @package SRC\Application\Presenter
 */
class JsonPresenter
{
    /**
     * @var Response
     */
    private $response;

    /**
     * JsonPresenter constructor.
     */
    public function __construct()
    {
        $this->response = new Response();
    }

    /**
     * @param $body
     * @param int $code
     * @return false|string
     */
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