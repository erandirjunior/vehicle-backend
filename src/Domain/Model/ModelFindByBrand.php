<?php

namespace SRC\Domain\Model;


use SRC\Domain\Model\Interfaces\ModelFindByBrandRepository;

class ModelFindByBrand
{
    private ModelFindByBrandRepository $repository;

    public function __construct(ModelFindByBrandRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List model by id.
     *
     * @param $id
     * @return array
     */
    public function handler($id)
    {
        return $this->repository->findByBrandId($id);
    }
}