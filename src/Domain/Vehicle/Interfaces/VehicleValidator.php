<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleValidator
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleValidator
{
    /**
     * @param VehicleBoundery $vehicleBoundery
     * @return bool
     */
    public function validate(VehicleBoundery $vehicleBoundery): bool;

    /**
     * @return array
     */
    public function errors(): array;
}