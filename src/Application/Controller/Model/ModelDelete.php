<?php

namespace SRC\Application\Controller\Model;

use PlugRoute\Http\Request;
use SRC\Application\Exception\ServerException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\ModelDeleteHandler;
use SRC\Domain\Model\Interfaces\ModelDeleteRepository;

/**
 * Class ModelDelete
 * @package SRC\Application\Controller\Model
 */
class ModelDelete
{
    /**
     * Call class to execute delete action and return a json.
     *
     * @param ModelDeleteRepository $modelDeleteRepository
     * @param Request $request
     *
     * @see JsonPresenter
     * @see ModelDeleteHandler
     */
    public function handler(ModelDeleteRepository $modelDeleteRepository, Request $request)
    {
        $jsonPresenter      = new JsonPresenter();
        $serverException    = new ServerException();

        try {
            $domain = new ModelDeleteHandler($modelDeleteRepository, $serverException);
            $domain->handler($request->parameter('id'));

            echo $jsonPresenter->json('', 204);
        } catch (\Exception $exception) {
            echo $jsonPresenter->json($exception->getMessage(), $exception->getCode());
        }
    }
}