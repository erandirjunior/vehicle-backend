<?php

namespace SRC\Application\Controller;

use SRC\Application\Presenter\JsonPresenter;
use SRC\Application\Response\Response;
use SRC\Domain\Brand\BrandFindAllHandler;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\ContactFindRepository;

class BrandFindAll
{
    public function findAll(BrandFindAllRepository $BrandFindAllRepository, ContactFindRepository $contactFindRepository)
    {
       /* $response = new Response();
        $domain = new BrandFindAllHandler($BrandFindAllRepository, $contactFindRepository, $response);
        $domain->findAll();

        echo (new JsonPresenter())->json($response->getBody(), $response->getCode());*/
    }
}