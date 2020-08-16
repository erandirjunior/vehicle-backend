<?php

namespace SRC\Application\Boundery;

use SRC\Application\Exception\ValidateException;
use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;

/**
 * Class Vehicle
 * @package SRC\Application\Boundery
 */
class Vehicle implements VehicleBoundery
{
    /**
     * @var float
     */
    private string $value;

    /**
     * @var int
     */
    private int $brandId;

    /**
     * @var int
     */
    private int $modelId;

    /**
     * @var int
     */
    private int $yearModel;

    /**
     * @var string
     */
    private string $fuel;

    /**
     * Vehicle constructor.
     * @param float $value
     * @param int $brandId
     * @param int $modelId
     * @param int $yearModel
     * @param string $fuel
     */
    public function __construct($value, $brandId, $modelId, $yearModel, $fuel)
    {
        $this->setValue($value);
        $this->setBrandId($brandId);
        $this->setModelId($modelId);
        $this->setYearModel($yearModel);
        $this->setFuel($fuel);
    }

    /**
     * @param float $value
     */
    private function setValue(string $value): void
    {
        if (empty($value)) {
            throw new ValidateException('Field value cannot be empty!');
        }

        $this->value = $value;
    }

    /**
     * @return mixed|float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $brandId
     */
    private function setBrandId(int $brandId): void
    {
        if (empty($brandId)) {
            throw new ValidateException('Field brand cannot be empty!');
        }
        $this->brandId = $brandId;
    }

    /**
     * @return int|mixed
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @param int $modelId
     */
    private function setModelId(int $modelId): void
    {
        if (empty($modelId)) {
            throw new ValidateException('Field model cannot be empty!');
        }

        $this->modelId = $modelId;
    }

    /**
     * @return int|mixed
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * @param int $yearModel
     */
    private function setYearModel(int $yearModel): void
    {
        if (empty($yearModel)) {
            throw new ValidateException('Field value cannot be empty!');
        }

        $this->yearModel = $yearModel;
    }

    /**
     * @return int|mixed
     */
    public function getYearModel()
    {
        return $this->yearModel;
    }

    /**
     * @param string $fuel
     */
    private function setFuel(string $fuel): void
    {
        if (empty($fuel)) {
            throw new ValidateException('Field fuel cannot be empty!');
        }

        $this->fuel = $fuel;
    }

    /**
     * @return mixed|string
     */
    public function getFuel()
    {
        return $this->fuel;
    }
}