<?php

namespace SRC\Application\Controller\Brand;

use PlugRoute\Http\Request;
use SRC\Application\Exception\ServerException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandDeleteHandler;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;

class BrandDelete
{
    public function handler(BrandDeleteRepository $BrandDeleteRepository, Request $request)
    {
        $jsonPresenter      = new JsonPresenter();
        $serverException    = new ServerException();

        try {
            $domain = new BrandDeleteHandler($BrandDeleteRepository, $serverException);
            $domain->handler($request->parameter('id'));

            echo $jsonPresenter->json('', 204);
        } catch (\Exception $exception) {
            echo $jsonPresenter->json($exception->getMessage(), $exception->getCode());
        }
    }
}