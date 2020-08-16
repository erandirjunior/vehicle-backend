<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;
use SRC\Domain\Vehicle\Interfaces\VehicleUpdateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleValidator;

/**
 * Class VehicleUpdateHandler
 * @package SRC\Domain\Vehicle
 */
class VehicleUpdateHandler
{
    /**
     * @var VehicleUpdateRepository
     */
    private VehicleUpdateRepository $repository;

    /**
     * @var VehicleBoundery
     */
    private VehicleBoundery $boundery;

    /**
     * @var VehicleValidator
     */
    private VehicleValidator $validator;

    /**
     * @var ValidateException
     */
    private ValidateException $validateException;

    /**
     * @var ServerException
     */
    private ServerException $serverException;

    /**
     * VehicleUpdateHandler constructor.
     * @param VehicleUpdateRepository $updateRepository
     * @param VehicleBoundery $vehicleBoundery
     * @param VehicleValidator $vehicleValidator
     * @param ValidateException $validateException
     * @param ServerException $serverException
     */
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

    /**
     * @param int $id
     * @return bool
     * @throws ValidateException
     */
    public function handler(int $id)
    {
        return $this->updateIfDataAreValids($id);
    }

    /**
     * @param $id
     * @return bool
     * @throws ServerException
     * @throws ValidateException
     */
    private function updateIfDataAreValids($id)
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        return $this->save($id);
    }

    /**
     * @param $id
     * @return bool
     * @throws ServerException
     */
    private function save($id)
    {
        try {
            return $this->repository->update($id, $this->boundery);
        } catch (\Exception $e) {
            $this->serverException->setMessage('The name is already in use!');

            throw $this->serverException;
        }
    }
}