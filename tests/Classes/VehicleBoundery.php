<?php

namespace SRC\Test\Classes;


/**
 * Class Vehicle
 * @package SRC\Application\Boundery
 */
class VehicleBoundery implements \SRC\Domain\Vehicle\Interfaces\VehicleBoundery
{
    /**
     * @var string
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
     * @param string $value
     * @param int $brandId
     * @param int $modelId
     * @param int $yearModel
     * @param string $fuel
     */
    public function __construct($value, $brandId, $modelId, $yearModel, $fuel)
    {
        $this->value = $value;
        $this->brandId = $brandId;
        $this->modelId = $modelId;
        $this->yearModel = $yearModel;
        $this->fuel = $fuel;
    }

    /**
     * @return mixed|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int|mixed
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return int|mixed
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * @return int|mixed
     */
    public function getYearModel()
    {
        return $this->yearModel;
    }

    /**
     * @return mixed|string
     */
    public function getFuel()
    {
        return $this->fuel;
    }
}