<?php

namespace SRC\Application\Controller\Brand;

use PlugRoute\Http\Request;
use SRC\Application\Boundery\Brand;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Application\Presenter\JsonPresenter;
use SRC\Domain\Brand\BrandCreateHandler;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;

/**
 * Class BrandCreate
 * @package SRC\Application\Controller\Brand
 */
class BrandCreate
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var BrandValidator
     */
    private BrandValidator $validator;

    /**
     * @var BrandCreateRepository
     */
    private BrandCreateRepository $repository;

    /**
     * BrandCreate constructor.
     * @param Request $request
     * @param BrandValidator $brandValidator
     * @param BrandCreateRepository $brandCreateRepository
     */
    public function __construct(
        Request $request,
        BrandValidator $brandValidator,
        BrandCreateRepository $brandCreateRepository
    )
    {
        $this->request = $request;
        $this->validator = $brandValidator;
        $this->repository = $brandCreateRepository;
    }

    /**
     * Call class to execute create action and return a json.
     *
     * @see BrandCreateHandler
     * @see JsonPresenter
     */
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