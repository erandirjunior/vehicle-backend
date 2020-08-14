<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleFindRepository
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleFindRepository
{
    /**
     * @param $id
     * @return array
     */
    public function findById($id): array;
}