<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\Response;

class BrandFindHandler
{
    private BrandFindRepository $repository;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(BrandFindRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handler($id)
    {
        return $this->repository->findById($id);
    }
}