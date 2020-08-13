<?php

namespace SRC\Application\Controller;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Application\Response\Response;
use SRC\Domain\Brand\BrandDeleteHandler;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;

class BrandDelete
{
    public function delete(BrandDeleteRepository $BrandDeleteRepository, Request $request)
    {
        /*$response = new Response();
        $domain = new BrandDeleteHandler($BrandDeleteRepository, $response);
        $domain->delete($request->parameter('id'));

        echo (new JsonPresenter())->json($response->getBody(), $response->getCode());*/
    }
}