<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelFindAllRepository;

class ModelFindAllHandler
{
    private ModelFindAllRepository $repository;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(ModelFindAllRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handler()
    {
        return $this->repository->findAll();
    }
}