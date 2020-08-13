<?php


namespace SRC\Application\Controller;


use PlugRoute\Http\Request;
use SRC\Application\Boundery\Brand;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Application\Response\Response;
use SRC\Domain\Brand\BrandUpdateHandler;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Brand\Interfaces\ContactCreateRepository;
use SRC\Domain\Brand\Interfaces\ContactDeleteRepository;
use SRC\Domain\Brand\Interfaces\ContactUpdateRepository;

class BrandUpdate
{
    /*private $request;

    private $repository;

    private $validator;


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

    public function update()
    {
        $id         = $this->request->parameter('id');
        $name       = $this->request->input('name');

        $brand     = new Brand($name);
        $response   = new Response();

        $domain = new BrandUpdateHandler(
            $this->repository,
            $brand,
            $this->validator,
            $response
        );

        $domain->update($id);

        echo (new JsonPresenter())->json($response->getBody(), $response->getCode());
    }*/
}