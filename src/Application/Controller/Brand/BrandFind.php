<?php

namespace SRC\Application\Controller\Brand;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandFindHandler;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;

/**
 * Class BrandFind
 * @package SRC\Application\Controller\Brand
 */
class BrandFind
{
    /**
     * Call class to execute list by id action and return a json.
     *
     * @param BrandFindRepository $brandFindRepository
     * @param Request $request
     *
     * @see JsonPresenter
     * @see BrandFindHandler
     */
    public function handler(BrandFindRepository $brandFindRepository, Request $request)
    {
        $domain = new BrandFindHandler($brandFindRepository);
        $data   = $domain->handler($request->parameter('id'));

        echo (new JsonPresenter())->json($data, 200);
    }
}