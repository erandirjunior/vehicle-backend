<?php

namespace SRC\Application\Controller\Brand;

use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandFindAllHandler;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;

class BrandFindAll
{
    public function handler(BrandFindAllRepository $BrandFindAllRepository)
    {
        $domain = new BrandFindAllHandler($BrandFindAllRepository);
        $data   = $domain->handler();

        echo (new JsonPresenter())->json($data, 200);
    }
}