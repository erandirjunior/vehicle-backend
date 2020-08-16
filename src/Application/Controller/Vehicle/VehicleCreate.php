<?php

namespace SRC\Application\Controller\Vehicle;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Vehicle;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Vehicle\Interfaces\VehicleCreateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleValidator;
use SRC\Domain\Vehicle\VehicleCreateHandler;

class VehicleCreate
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var VehicleValidator
     */
    private VehicleValidator $validator;

    /**
     * @var VehicleCreateRepository
     */
    private VehicleCreateRepository $repository;

    /**
     * BrandCreate constructor.
     * @param Request $request
     * @param VehicleValidator $vehicleValidator
     * @param VehicleCreateRepository $vehicleCreateRepository
     */
    public function __construct(
        Request $request,
        VehicleValidator $vehicleValidator,
        VehicleCreateRepository $vehicleCreateRepository
    )
    {
        $this->request = $request;
        $this->validator = $vehicleValidator;
        $this->repository = $vehicleCreateRepository;
    }

    /**
     * Call class to execute create action and return a json.
     *
     * @see VehicleCreateHandler
     * @see JsonPresenter
     */
    public function handler()
    {
        $value              = $this->request->input('value');
        $brandId            = $this->request->input('brandId');
        $modelId            = $this->request->input('modelId');
        $yearModel          = $this->request->input('yearModel');
        $fuel               = $this->request->input('fuel');
        $validateException  = new ValidateException();
        $serverException    = new ServerException();
        $jsonPresenter      = new JsonPresenter();

        try {
            $vehicle    = new Vehicle($value, $brandId, $modelId, $yearModel, $fuel);
            $domain     = new VehicleCreateHandler(
                $vehicle,
                $this->repository,
                $this->validator,
                $validateException,
                $serverException
            );

            $domain->handler();

            echo $jsonPresenter->json('', 201);
        } catch (\Exception $exception) {
            echo $jsonPresenter->json($exception->getMessage(), $exception->getCode());
        }
    }
}