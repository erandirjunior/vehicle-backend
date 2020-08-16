<?php

namespace SRC\Application\Controller\Model;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\Interfaces\ModelFindByBrandRepository;
use SRC\Domain\Model\ModelFindByBrand;
use SRC\Domain\Model\ModelFindHandler;
use SRC\Domain\Model\Interfaces\ModelFindRepository;

/**
 * Class ModelFind
 * @package SRC\Application\Controller\Model
 */
class ModelFind
{
    /**
     * Check if has token, if has the call find by id action, if else call find by brand id action.
     *
     * @param ModelFindRepository $modelFindRepository
     * @param ModelFindByBrandRepository $modelFindByBrandRepository
     * @param Request $request
     */
    public function handler(
        ModelFindRepository $modelFindRepository,
        ModelFindByBrandRepository $modelFindByBrandRepository,
        Request $request
    )
    {
        $token = $request->header('HTTP_AUTHORIZATION');
        $id = $request->parameter('id');
        $data = [];

        if ($token) {
            $domain = new ModelFindHandler($modelFindRepository);
            $data   = $domain->handler($id);
        }

        if (!$token) {
            $domain = new ModelFindByBrand($modelFindByBrandRepository);
            $data = $domain->handler($id);
        }


        echo (new JsonPresenter())->json($data, 200);
    }
}