<?php

namespace SRC\Application\Controller\Model;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Model;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Model\Interfaces\ModelCreateRepository;
use SRC\Domain\Model\Interfaces\ModelValidator;
use SRC\Domain\Model\ModelCreateHandler;

class ModelCreate
{
    private Request $request;

    private ModelValidator $validator;

    private ModelCreateRepository $repository;

    public function __construct(
        Request $request,
        ModelValidator $modelValidator,
        ModelCreateRepository $modelCreateRepository
    )
    {
        $this->request = $request;
        $this->validator = $modelValidator;
        $this->repository = $modelCreateRepository;
    }

    public function handler()
    {
        $name               = $this->request->input('name');
        $brandId            = $this->request->input('brandId');
        $validateException  = new ValidateException();
        $serverException    = new ServerException();
        $jsonPresenter      = new JsonPresenter();

        try {
            $brand  = new Model($name, $brandId);
            $domain = new ModelCreateHandler(
                $brand,
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