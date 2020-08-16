<?php

namespace SRC\Application\Controller\Vehicle;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Vehicle;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Vehicle\Interfaces\VehicleUpdateRepository;
use SRC\Domain\Vehicle\Interfaces\VehicleValidator;
use SRC\Domain\Vehicle\VehicleUpdateHandler;

class VehicleUpdate
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
     * @var VehicleUpdateRepository
     */
    private VehicleUpdateRepository $repository;

    /**
     * VehicleCreate constructor.
     * @param Request $request
     * @param VehicleValidator $vehicleValidator
     * @param VehicleUpdateRepository $vehicleUpdateRepository
     */
    public function __construct(
        Request $request,
        VehicleValidator $vehicleValidator,
        VehicleUpdateRepository $vehicleUpdateRepository
    )
    {
        $this->request = $request;
        $this->validator = $vehicleValidator;
        $this->repository = $vehicleUpdateRepository;
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
        $id                 = $this->request->parameter('id');
        $validateException  = new ValidateException();
        $serverException    = new ServerException();
        $jsonPresenter      = new JsonPresenter();

        try {
            $vehicle    = new Vehicle($value,$brandId, $modelId, $yearModel, $fuel);
            $domain     = new VehicleUpdateHandler(
                $this->repository,
                $vehicle,
                $this->validator,
                $validateException,
                $serverException
            );

            $domain->handler($id);

            echo $jsonPresenter->json('', 204);
        } catch (\Exception $exception) {
            echo $jsonPresenter->json($exception->getMessage(), $exception->getCode());
        }
    }
}