<?php

namespace SRC\Application\Controller;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Brand;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Application\Response\Response;
use SRC\Domain\Brand\BrandCreateHandler;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Brand\Interfaces\ContactCreateRepository;

class BrandCreate
{
    private $request;

    private $validator;

    private $repository;

    public function __construct(
        Request $request,
        BrandValidator $BrandValidator,
        BrandCreateRepository $BrandCreateRepository
    )
    {
        $this->request = $request;
        $this->validator = $BrandValidator;
        $this->repository = $BrandCreateRepository;
    }

    public function handler()
    {
        $name               = $this->request->input('name');
        $validateException  = new ValidateException();
        $serverException    = new ServerException();
        $jsonPresenter      = new JsonPresenter();

        try {
            $brand  = new Brand($name);
            $domain = new BrandCreateHandler(
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