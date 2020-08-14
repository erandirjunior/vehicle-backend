<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelFindRepository;

class ModelFindHandler
{
    private ModelFindRepository $repository;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(ModelFindRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handler($id)
    {
        return $this->repository->findById($id);
    }
}