<?php

namespace SRC\Infrastructure\Validator;

use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;

/**
 * Class BrandValidator
 * @package SRC\Infrastructure\Validator
 */
class VehicleValidator implements \SRC\Domain\Vehicle\Interfaces\VehicleValidator
{
    /**
     * @var array
     */
    private $errors;

    /**
     * BrandValidator constructor.
     */
    public function __construct()
    {
        $this->errors = [];
    }

    /**
     * @param VehicleBoundery $vehicleBoundery
     * @return bool
     */
    public function validate(VehicleBoundery $vehicleBoundery): bool
    {
        if (empty($vehicleBoundery->getBrandId())) {
            $this->errors[] = 'Field brand cannot be empty';
        }

        if (empty($vehicleBoundery->getModelId())) {
            $this->errors[] = 'Field model cannot be empty';
        }

        if (empty($vehicleBoundery->getFuel())) {
            $this->errors[] = 'Field fuel cannot be empty';
        }

        if (empty($vehicleBoundery->getValue())) {
            $this->errors[] = 'Field value cannot be empty';
        }

        if (empty($vehicleBoundery->getYearModel())) {
            $this->errors[] = 'Field year cannot be empty';
        }

        return !!$this->errors;
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

}