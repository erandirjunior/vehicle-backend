<?php

namespace SRC\Application\Controller\Vehicle;

use PlugRoute\Http\Request;
use SRC\Application\Exception\ServerException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Vehicle\Interfaces\VehicleDeleteRepository;
use SRC\Domain\Vehicle\VehicleDeleteHandler;

class VehicleDelete
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var VehicleDeleteRepository
     */
    private VehicleDeleteRepository $repository;

    /**
     * VehicleCreate constructor.
     * @param Request $request
     * @param VehicleDeleteRepository $vehicleDeleteRepository
     */
    public function __construct(
        Request $request,
        VehicleDeleteRepository $vehicleDeleteRepository
    )
    {
        $this->request = $request;
        $this->repository = $vehicleDeleteRepository;
    }

    /**
     * Call class to execute create action and return a json.
     *
     * @see VehicleCreateHandler
     * @see JsonPresenter
     */
    public function handler()
    {
        $id             = $this->request->parameter('id');
        $jsonPresenter  = new JsonPresenter();
        $domain = new VehicleDeleteHandler($this->repository, new ServerException());
        $domain->handler($id);
        echo $jsonPresenter->json('', 204);
    }
}