<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Vehicle\Interfaces\VehicleFindAllRepository;

class VehicleFindAllHandler
{
    private VehicleFindAllRepository $repository;

    /**
     * VehicleFindAllRepository constructor.
     * @param $repository
     */
    public function __construct(VehicleFindAllRepository $vehicleFindAllRepository)
    {
        $this->repository = $vehicleFindAllRepository;
    }

    public function handler()
    {
        return $this->repository->findAll();
    }
}