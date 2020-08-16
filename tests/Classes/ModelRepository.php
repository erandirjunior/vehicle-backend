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
class ModelRepository implements
    ModelCreateRepository,
    ModelUpdateRepository,
    ModelFindAllRepository,
    ModelFindRepository,
    ModelDeleteRepository
{
    /**
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function create(ModelBoundery $modelBoundery): bool
    {
        return true;
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
     * @return array
     */
    public function findAll(): array
    {
        return [
            [
                "name" => "AMAROK CD2.0 16V/S CD2.0 16V TDI 4x2 Die",
                "id" => 1
            ],
            [
                "name" => "AMAROK CD2.0 16V/S CD2.0 16V TDI 4x4 Die",
                "id" => 2
            ],
            [
                "name" => "AMAROK CS2.0 16V/S2.0 16V TDI 4x2 Diesel",
                "id" => 3
            ]
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public function findById($id): array
    {
        $arr =  [
            [
                "name" => "AMAROK CD2.0 16V/S CD2.0 16V TDI 4x2 Die",
                "id" => 1
            ],
            [
                "name" => "AMAROK CD2.0 16V/S CD2.0 16V TDI 4x4 Die",
                "id" => 2
            ],
            [
                "name" => "AMAROK CS2.0 16V/S2.0 16V TDI 4x2 Diesel",
                "id" => 2
            ]
        ];

        return $arr[$id - 1];
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return true;
    }

    /**
     * @param int $id
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function update(int $id, ModelBoundery $modelBoundery): bool
    {
        return true;
    }

    public function checkIfUniqueModelName(int $id, string $name)
    {
        return false;
    }
}