<?php

namespace SRC\Domain\Brand;

use SRC\Application\Response\Response;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\ContactFindRepository;

class BrandFindAllHandler
{
    private $repository;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(BrandFindAllRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handler()
    {
        return $this->repository->findAll();
    }
}