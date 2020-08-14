<?php

namespace SRC\Application\Controller\Model;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\ModelFindHandler;
use SRC\Domain\Model\Interfaces\ModelFindRepository;

class ModelFind
{
    public function handler(ModelFindRepository $modelFindRepository, Request $request)
    {
        $domain = new ModelFindHandler($modelFindRepository);
        $data   = $domain->handler($request->parameter('id'));

        echo (new JsonPresenter())->json($data, 200);
    }
}