<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleCreateRepository
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleCreateRepository
{
    /**
     * @param VehicleBoundery $vehicleBoundery
     * @return bool
     */
    public function create(VehicleBoundery $vehicleBoundery): bool;
}