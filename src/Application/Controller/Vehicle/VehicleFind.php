<?php

namespace SRC\Application\Controller\Vehicle;

use PlugRoute\Http\Request;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Vehicle\Interfaces\VehicleFindRepository;
use SRC\Domain\Vehicle\VehicleFindByModelHandler;
use SRC\Domain\Vehicle\VehicleFindHandler;

class VehicleFind
{
    /**
     * @var Request
     */
    private Request $request;

    private $repositoryFindByModel;

    private $repositoryFindById;

    public function __construct(
        Request $request,
        VehicleFindRepository $vehicleFindRepository,
        \SRC\Domain\Vehicle\Interfaces\VehicleFindAllByModel $vehicleFindAllByModel
    )
    {
        $this->request = $request;
        $this->repositoryFindById = $vehicleFindRepository;
        $this->repositoryFindByModel = $vehicleFindAllByModel;
    }

    /**
     * Call class to execute list all vehicles action and return a json.
     *
     * @see VehicleFindByModelHandler
     * @see JsonPresenter
     */
    public function handler()
    {
        $token = $this->request->header('HTTP_AUTHORIZATION');
        $id = $this->request->parameter('id');
        $data = [];

        if ($token) {
            $domain = new VehicleFindByModelHandler($this->repositoryFindByModel);
            $data = $domain->handler($id);
        }

        if (!$token) {
            $domain = new VehicleFindHandler($this->repositoryFindById);
            $data = $domain->handler($id);
        }

        $jsonPresenter = new JsonPresenter();

        echo $jsonPresenter->json($data, 200);
    }
}