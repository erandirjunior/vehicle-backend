<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;

/**
 * Class BrandFindAllHandler
 * @package SRC\Domain\Brand
 */
class BrandFindAllHandler
{
    /**
     * @var BrandFindAllRepository
     */
    private BrandFindAllRepository $repository;

    /**
     * BrandFindAllHandler constructor.
     * @param BrandFindAllRepository $repository
     */
    public function __construct(BrandFindAllRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all brands.
     *
     * @return array
     */
    public function handler()
    {
        return $this->repository->findAll();
    }
}