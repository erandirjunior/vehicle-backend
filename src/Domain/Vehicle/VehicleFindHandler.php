<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Vehicle\Interfaces\VehicleFindRepository;

class VehicleFindHandler
{
    private VehicleFindRepository $repository;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(VehicleFindRepository $vehicleFindRepository)
    {
        $this->repository = $vehicleFindRepository;
    }

    public function handler($id)
    {
        return $this->repository->findById($id);
    }
}