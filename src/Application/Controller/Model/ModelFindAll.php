<?php

namespace SRC\Application\Controller\Model;

use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\Interfaces\ModelFindAllRepository;
use SRC\Domain\Model\ModelFindAllHandler;

class ModelFindAll
{
    public function handler(ModelFindAllRepository $modelFindAll)
    {
        $domain = new ModelFindAllHandler($modelFindAll);
        $data   = $domain->handler();

        echo (new JsonPresenter())->json($data, 200);
    }
}