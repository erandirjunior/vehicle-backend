<?php

namespace SRC\Application\Controller;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandFindHandler;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;

class BrandFind
{
    public function handler(BrandFindRepository $BrandFindRepository, Request $request)
    {
        $domain = new BrandFindHandler($BrandFindRepository);
        $data   = $domain->handler($request->parameter('id'));

        echo (new JsonPresenter())->json($data, 200);
    }
}