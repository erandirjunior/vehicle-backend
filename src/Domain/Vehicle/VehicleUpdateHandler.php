<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;
use SRC\Domain\Vehicle\Interfaces\VehicleUpdateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleValidator;

class VehicleUpdateHandler
{
    private VehicleUpdateRepository $repository;

    private VehicleBoundery $boundery;

    private VehicleValidator $validator;

    private ValidateException $validateException;

    private ServerException $serverException;

    public function __construct(
        VehicleUpdateRepository $updateRepository,
        VehicleBoundery $vehicleBoundery,
        VehicleValidator $vehicleValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->repository           = $updateRepository;
        $this->boundery             = $vehicleBoundery;
        $this->validator            = $vehicleValidator;
        $this->validateException    = $validateException;
        $this->serverException      = $serverException;
    }

    public function handler(int $id)
    {
        $this->updateIfDataAreValids($id);
    }

    private function updateIfDataAreValids($id)
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        $this->save($id);
    }

    private function save($id)
    {
        try {
            $this->repository->update($id, $this->boundery);
        } catch (\Exception $e) {
            $this->serverException->setMessage('The name is already in use!');

            throw $this->serverException;
        }
    }
}