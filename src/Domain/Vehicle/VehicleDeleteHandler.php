<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Exception\ServerException;
use SRC\Domain\Vehicle\Interfaces\VehicleDeleteRepository;

/**
 * Class VehicleDeleteHandler
 * @package SRC\Domain\Vehicle
 */
class VehicleDeleteHandler
{
    /**
     * @var VehicleDeleteRepository
     */
    private VehicleDeleteRepository $repository;

    /**
     * @var ServerException
     */
    private ServerException $serverException;

    /**
     * VehicleDeleteHandler constructor.
     * @param VehicleDeleteRepository $vehicleDeleteRepository
     * @param ServerException $serverException
     */
    public function __construct(
        VehicleDeleteRepository $vehicleDeleteRepository,
        ServerException $serverException
    )
    {
        $this->repository       = $vehicleDeleteRepository;
        $this->serverException  = $serverException;
    }

    /**
     * @param $id
     * @return bool
     * @throws ServerException
     */
    public function handler($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (\Exception $e) {
            $this->serverException->setMessage('The name is already in use!');

            throw $this->serverException;
        }
    }
}