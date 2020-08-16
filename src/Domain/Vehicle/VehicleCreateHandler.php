<?php

namespace SRC\Domain\Vehicle;

use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Vehicle\Interfaces\VehicleBoundery;
use SRC\Domain\Vehicle\Interfaces\VehicleCreateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleValidator;

/**
 * Class VehicleCreateHandler
 * @package SRC\Domain\Vehicle
 */
class VehicleCreateHandler
{
    /**
     * @var VehicleBoundery
     */
    private VehicleBoundery $boundery;

    /**
     * @var VehicleCreateRepository
     */
    private VehicleCreateRepository $repository;

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
     * VehicleCreateHandler constructor.
     * @param VehicleBoundery $vehicleBoundery
     * @param VehicleCreateRepository $vehicleCreateRepository
     * @param VehicleValidator $vehicleValidator
     * @param ValidateException $validateException
     * @param ServerException $serverException
     */
    public function __construct(
        VehicleBoundery $vehicleBoundery,
        VehicleCreateRepository $vehicleCreateRepository,
        VehicleValidator $vehicleValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->boundery             = $vehicleBoundery;
        $this->repository           = $vehicleCreateRepository;
        $this->validator            = $vehicleValidator;
        $this->validateException    = $validateException;
        $this->serverException      = $serverException;
    }

    /**
     * Save new vehicle.
     *
     * @throws ValidateException
     */
    public function handler()
    {
        return $this->createIfDataAreValids();
    }

    /**
     * @throws ValidateException
     */
    private function createIfDataAreValids()
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException
                ->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        return $this->save();
    }

    /**
     * @throws ServerException
     */
    private function save()
    {
        try {
            return $this->repository->create($this->boundery);
        } catch (\Exception $e) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }
    }
}