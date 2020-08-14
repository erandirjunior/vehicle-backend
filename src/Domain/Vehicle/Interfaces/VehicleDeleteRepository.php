<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleDeleteRepository
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleDeleteRepository
{
    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool;
}