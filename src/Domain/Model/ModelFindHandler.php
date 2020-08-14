<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelFindRepository;

/**
 * Class ModelFindHandler
 * @package SRC\Domain\Model
 */
class ModelFindHandler
{
    /**
     * @var ModelFindRepository
     */
    private ModelFindRepository $repository;

    /**
     * ModelFindHandler constructor.
     * @param ModelFindRepository $repository
     */
    public function __construct(ModelFindRepository $repository)
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
        return $this->repository->findById($id);
    }
}