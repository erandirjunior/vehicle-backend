<?php


namespace SRC\Domain\Vehicle;


use SRC\Domain\Exception\ServerException;
use SRC\Domain\Vehicle\Interfaces\VehicleDeleteRepository;

class VehicleDeleteHandler
{
    private VehicleDeleteRepository $repository;

    private ServerException $serverException;

    public function __construct(
        VehicleDeleteRepository $vehicleDeleteRepository,
        ServerException $serverException
    )
    {
        $this->repository       = $vehicleDeleteRepository;
        $this->serverException  = $serverException;
    }

    public function handler($id)
    {
        if (!$this->repository->delete($id)) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }
    }
}