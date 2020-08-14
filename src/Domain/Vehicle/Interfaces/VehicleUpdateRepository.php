<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleUpdateRepository
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleUpdateRepository
{
    /**
     * @param int $id
     * @param VehicleBoundery $vehicleBoundery
     * @return bool
     */
    public function update(int $id, VehicleBoundery $vehicleBoundery): bool;
}