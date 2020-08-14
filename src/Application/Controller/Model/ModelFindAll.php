<?php

namespace SRC\Application\Controller\Model;

use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\Interfaces\ModelFindAllRepository;
use SRC\Domain\Model\ModelFindAllHandler;

/**
 * Class ModelFindAll
 * @package SRC\Application\Controller\Model
 */
class ModelFindAll
{
    /**
     * Call class to execute list action and return a json.
     *
     * @param ModelFindAllRepository $modelFindAll
     *
     * @see JsonPresenter
     * @see ModelFindAllHandler
     */
    public function handler(ModelFindAllRepository $modelFindAll)
    {
        $domain = new ModelFindAllHandler($modelFindAll);
        $data   = $domain->handler();

        echo (new JsonPresenter())->json($data, 200);
    }
}