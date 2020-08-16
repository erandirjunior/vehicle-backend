<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Vehicle\Interfaces\VehicleFindAllByModel;

/**
 * Class VehicleFindByModel
 * @package SRC\Domain\Vehicle
 */
class VehicleFindByModelHandler
{
    /**
     * @var VehicleFindAllByModel
     */
    private VehicleFindAllByModel $repository;

    /**
     * VehicleFindByModel constructor.
     * @param VehicleFindAllByModel $vehicleFindAllByModel
     */
    public function __construct(VehicleFindAllByModel $vehicleFindAllByModel)
    {
        $this->repository = $vehicleFindAllByModel;
    }

    /**
     * @param $id
     * @return array
     */
    public function handler($id)
    {
        $data = $this->repository->findAllByModel($id);

        foreach ($data as $key => $value) {
            $data[$key]['value'] = "R$ ".number_format($data[$key]['value'],2, ',', '.');
        }

        return $data;
    }
}