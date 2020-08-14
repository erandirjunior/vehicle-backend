<?php

namespace SRC\Domain\Vehicle\Interfaces;

/**
 * Interface VehicleBoundery
 * @package SRC\Domain\Vehicle\Interfaces
 */
interface VehicleBoundery
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return mixed
     */
    public function getBrandId();

    /**
     * @return mixed
     */
    public function getModelId();

    /**
     * @return mixed
     */
    public function getYearModel();

    /**
     * @return mixed
     */
    public function getFuel();
}