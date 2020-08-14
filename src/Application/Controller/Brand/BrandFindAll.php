<?php

namespace SRC\Application\Controller\Brand;

use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandFindAllHandler;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;

/**
 * Class BrandFindAll
 * @package SRC\Application\Controller\Brand
 */
class BrandFindAll
{
    /**
     * Call class to execute list action and return a json.
     *
     * @param BrandFindAllRepository $brandFindAllRepository
     *
     * @see JsonPresenter
     * @see BrandFindAllHandler
     */
    public function handler(BrandFindAllRepository $brandFindAllRepository)
    {
        $domain = new BrandFindAllHandler($brandFindAllRepository);
        $data   = $domain->handler();

        echo (new JsonPresenter())->json($data, 200);
    }
}