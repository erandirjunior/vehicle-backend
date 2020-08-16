<?php

namespace SRC\Test\Classes;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;
use SRC\Domain\Vehicle\Interfaces\VehicleCreateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleDeleteRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleFindAllByModel;
use SRC\Domain\Vehicle\Interfaces\VehicleFindAllRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleFindRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleUpdateRepository;

/**
 * Class BrandRepository
 * @package SRC\Infrastructure\Repository
 */
class VehicleRepository implements
    VehicleCreateRepository,
    VehicleDeleteRepository,
    VehicleFindRepository,
    VehicleUpdateRepository,
    VehicleFindAllByModel
{
    public function create(VehicleBoundery $vehicleBoundery): bool
    {
        return true;
    }

    /**
     * @param $id
     * @return array
     */
    public function findById($id): array
    {
        $data = [
            [
                "id" => 1,
                "value" => 10254.00,
                "brandId" => 1,
                "modelId" => 1,
                "yearModel" => 1992,
                "fuel" => "Gasolina"
            ],
            [
                "id" => 2,
                "value" => 11532.00,
                "brandId" => 1,
                "modelId" => 1,
                "yearModel" => 1992,
                "fuel" => "Gasolina"
            ]
        ];

        return $data[$id - 1];
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return true;
    }

    public function update(int $id, VehicleBoundery $vehicleBoundery): bool
    {
        return true;
    }

    public function findAllByModel($id): array
    {
        return [
            [
                "id" => 1,
                "value" => 10254.00,
                "brand" => "Acura",
                "model" => "Integra GS 1.8",
                "yearModel" => 1992,
                "fuel" => "Gasolina"
            ],
            [
                "id" => 2,
                "value" => 11532.00,
                "brand" => "Alfa Romeo",
                "model" => "Integra GS 1.8",
                "yearModel" => 2020,
                "fuel" => "Gasolina"
            ]
        ];
    }
}