<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelFindAllRepository;

/**
 * Class ModelFindAllHandler
 * @package SRC\Domain\Model
 */
class ModelFindAllHandler
{
    /**
     * @var ModelFindAllRepository
     */
    private ModelFindAllRepository $repository;

    /**
     * ModelFindAllHandler constructor.
     * @param ModelFindAllRepository $repository
     */
    public function __construct(ModelFindAllRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all models.
     *
     * @return array
     */
    public function handler()
    {
        return $this->repository->findAll();
    }
}