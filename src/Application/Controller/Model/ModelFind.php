<?php

namespace SRC\Application\Controller\Model;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\ModelFindHandler;
use SRC\Domain\Model\Interfaces\ModelFindRepository;

/**
 * Class ModelFind
 * @package SRC\Application\Controller\Model
 */
class ModelFind
{
    /**
     * Call class to execute list by id action and return a json.
     *
     * @param ModelFindRepository $modelFindRepository
     * @param Request $request
     *
     * @see JsonPresenter
     * @see ModelFindHandler
     */
    public function handler(ModelFindRepository $modelFindRepository, Request $request)
    {
        $domain = new ModelFindHandler($modelFindRepository);
        $data   = $domain->handler($request->parameter('id'));

        echo (new JsonPresenter())->json($data, 200);
    }
}