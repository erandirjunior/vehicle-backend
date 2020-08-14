<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandFindRepository;

/**
 * Class BrandFindHandler
 * @package SRC\Domain\Brand
 */
class BrandFindHandler
{
    /**
     * @var BrandFindRepository
     */
    private BrandFindRepository $repository;

    /**
     * List brand by id.
     *
     * BrandFindHandler constructor.
     * @param BrandFindRepository $repository
     */
    public function __construct(BrandFindRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return array
     */
    public function handler($id)
    {
        return $this->repository->findById($id);
    }
}