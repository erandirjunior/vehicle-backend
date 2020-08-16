<?php

namespace SRC\Test\Classes;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Model\Interfaces\ModelBoundery;
use SRC\Domain\Model\Interfaces\ModelCreateRepository;
use SRC\Domain\Model\Interfaces\ModelDeleteRepository;
use SRC\Domain\Model\Interfaces\ModelFindAllRepository;
use SRC\Domain\Model\Interfaces\ModelFindRepository;
use SRC\Domain\Model\Interfaces\ModelUpdateRepository;

/**
 * Class ModelRepository
 * @package SRC\Infrastructure\Repository
 */
class ModelExceptionRepository implements
    ModelCreateRepository,
    ModelUpdateRepository,
    ModelDeleteRepository
{
    private $return = true;

    public function setReturn($return): void
    {
        $this->return = $return;
    }

    /**
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function create(ModelBoundery $modelBoundery): bool
    {
        throw new \Exception();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function findByModelName(string $name): bool
    {
        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        throw new \Exception();
    }

    /**
     * @param int $id
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function update(int $id, ModelBoundery $modelBoundery): bool
    {
        throw new \Exception();
    }

    public function checkIfUniqueModelName(int $id, string $name)
    {
        return false;
    }
}