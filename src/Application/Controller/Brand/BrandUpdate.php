<?php

namespace SRC\Application\Controller\Brand;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Brand;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandUpdateHandler;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;

class BrandUpdate
{
    private Request $request;

    private BrandUpdateRepository $repository;

    private BrandValidator $validator;


    public function __construct(
        Request $request,
        BrandUpdateRepository $BrandUpdateRepository,
        BrandValidator $BrandValidator
    )
    {
        $this->request                  = $request;
        $this->repository               = $BrandUpdateRepository;
        $this->validator                = $BrandValidator;
    }

    public function handler()
    {
        $id                 = $this->request->parameter('id');
        $name               = $this->request->input('name');
        $validateException  = new ValidateException();
        $serverException    = new ServerException();
        $jsonPresenter      = new JsonPresenter();

        try {
            $brand  = new Brand($name);
            $domain = new BrandUpdateHandler(
                $this->repository,
                $brand,
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