<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Brand\Interfaces\ContactCreateRepository;
use SRC\Domain\Brand\Interfaces\Response;
use SRC\Domain\Exception\DuplicateException;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Exception\ServerException;

class BrandCreateHandler
{
    private BrandBoundery $boundery;

    private BrandCreateRepository $repository;

    private BrandValidator $validator;

    private ValidateException $validateException;

    private ServerException $serverException;

    public function __construct(
        BrandBoundery $BrandBoundery,
        BrandCreateRepository $BrandCreateRepository,
        BrandValidator $BrandValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->boundery             = $BrandBoundery;
        $this->repository           = $BrandCreateRepository;
        $this->validator            = $BrandValidator;
        $this->validateException    = $validateException;
        $this->serverException      = $serverException;
    }

    public function handler()
    {
        $this->createIfDataAreValids();
    }

    private function createIfDataAreValids()
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException
                ->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        $this->createIfUniqueBrandName();
    }

    private function createIfUniqueBrandName()
    {
        if ($this->repository->findByBrandName($this->boundery->getName())) {
            $this->validateException
            ->setMessage('The name is already in use!');

            throw $this->validateException;
        }

        $this->save();
    }

    private function save()
    {
        if (!$this->repository->create($this->boundery)) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }

    }
}