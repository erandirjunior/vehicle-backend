<?php

namespace SRC\Application\Controller\Brand;

use PlugRoute\Http\Request;
use SRC\Application\Exception\ServerException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandDeleteHandler;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;

/**
 * Class BrandDelete
 * @package SRC\Application\Controller\Brand
 */
class BrandDelete
{
    /**
     * Call class to execute delete action and return a json.
     *
     * @param BrandDeleteRepository $brandDeleteRepository
     * @param Request $request
     *
     * @see JsonPresenter
     * @see BrandDeleteHandler
     */
    public function handler(BrandDeleteRepository $brandDeleteRepository, Request $request)
    {
        $jsonPresenter      = new JsonPresenter();
        $serverException    = new ServerException();

        try {
            $domain = new BrandDeleteHandler($brandDeleteRepository, $serverException);
            $domain->handler($request->parameter('id'));

            echo $jsonPresenter->json('', 204);
        } catch (\Exception $exception) {
            echo $jsonPresenter->json($exception->getMessage(), $exception->getCode());
        }
    }
}