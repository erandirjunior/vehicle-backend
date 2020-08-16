<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleFindAllByModel
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleFindAllByModel
{

    /**
     * @param $id
     * @return array
     */
    public function findAllByModel($id): array;
}