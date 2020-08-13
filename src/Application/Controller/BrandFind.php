<?php

namespace SRC\Application\Controller;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Application\Response\Response;
use SRC\Domain\Brand\BrandFindHandler;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;

class BrandFind
{
    public function findById(BrandFindRepository $BrandFindRepository, Request $request)
    {
        /*$response = new Response();
        $domain = new BrandFindHandler($BrandFindRepository, $response);
        $domain->findById($request->parameter('id'));

        echo (new JsonPresenter())->json($response->getBody(), $response->getCode());*/
    }
}