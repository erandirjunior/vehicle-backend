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

/**
 * Class BrandUpdate
 * @package SRC\Application\Controller\Brand
 */
class BrandUpdate
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var BrandUpdateRepository
     */
    private BrandUpdateRepository $repository;

    /**
     * @var BrandValidator
     */
    private BrandValidator $validator;


    /**
     * BrandUpdate constructor.
     * @param Request $request
     * @param BrandUpdateRepository $brandUpdateRepository
     * @param BrandValidator $brandValidator
     */
    public function __construct(
        Request $request,
        BrandUpdateRepository $brandUpdateRepository,
        BrandValidator $brandValidator
    )
    {
        $this->request                  = $request;
        $this->repository               = $brandUpdateRepository;
        $this->validator                = $brandValidator;
    }

    /**
     * Call class to execute update action and return a json.
     *
     * @see JsonPresenter
     * @see BrandUpdateHandler
     */
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