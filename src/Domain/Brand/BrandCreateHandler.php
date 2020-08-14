<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Exception\ServerException;

/**
 * Class BrandCreateHandler
 * @package SRC\Domain\Brand
 */
class BrandCreateHandler
{
    /**
     * @var BrandBoundery
     */
    private BrandBoundery $boundery;

    /**
     * @var BrandCreateRepository
     */
    private BrandCreateRepository $repository;

    /**
     * @var BrandValidator
     */
    private BrandValidator $validator;

    /**
     * @var ValidateException
     */
    private ValidateException $validateException;

    /**
     * @var ServerException
     */
    private ServerException $serverException;

    /**
     * BrandCreateHandler constructor.
     * @param BrandBoundery $brandBoundery
     * @param BrandCreateRepository $brandCreateRepository
     * @param BrandValidator $brandValidator
     * @param ValidateException $validateException
     * @param ServerException $serverException
     */
    public function __construct(
        BrandBoundery $brandBoundery,
        BrandCreateRepository $brandCreateRepository,
        BrandValidator $brandValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->boundery             = $brandBoundery;
        $this->repository           = $brandCreateRepository;
        $this->validator            = $brandValidator;
        $this->validateException    = $validateException;
        $this->serverException      = $serverException;
    }

    /**
     * Save new brand.
     *
     * @throws ValidateException
     */
    public function handler()
    {
        $this->createIfDataAreValids();
    }

    /**
     * @throws ValidateException
     */
    private function createIfDataAreValids()
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException
                ->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        $this->createIfUniqueBrandName();
    }

    /**
     * @throws ServerException
     * @throws ValidateException
     */
    private function createIfUniqueBrandName()
    {
        if ($this->repository->findByBrandName($this->boundery->getName())) {
            $this->validateException
            ->setMessage('The name is already in use!');

            throw $this->validateException;
        }

        $this->save();
    }

    /**
     * @throws ServerException
     */
    private function save()
    {
        try {
            $this->repository->create($this->boundery);
        } catch (\Exception $e) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }
    }
}