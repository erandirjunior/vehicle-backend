<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Vehicle\Interfaces\VehicleFindRepository;

/**
 * Class VehicleFindHandler
 * @package SRC\Domain\Vehicle
 */
class VehicleFindHandler
{
    /**
     * @var VehicleFindRepository
     */
    private VehicleFindRepository $repository;

    /**
     * VehicleFindHandler constructor.
     * @param VehicleFindRepository $vehicleFindRepository
     */
    public function __construct(VehicleFindRepository $vehicleFindRepository)
    {
        $this->repository = $vehicleFindRepository;
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