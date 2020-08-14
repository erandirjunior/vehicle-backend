<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;

class BrandFindAllHandler
{
    private BrandFindAllRepository $repository;

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