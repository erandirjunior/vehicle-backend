<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleFindAllRepository
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleFindAllRepository
{
    /**
     * @return array
     */
    public function findAll(): array;
}