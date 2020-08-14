<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Brand\Interfaces\ContactCreateRepository;
use SRC\Domain\Brand\Interfaces\ContactDeleteRepository;
use SRC\Domain\Brand\Interfaces\ContactUpdateRepository;
use SRC\Domain\Brand\Interfaces\Response;
use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;

class BrandUpdateHandler
{
    private $repository;

    private $boundery;

    private $validator;

    private ValidateException $validateException;

    private ServerException $serverException;

    public function __construct(
        BrandUpdateRepository $brandUpdateRepository,
        BrandBoundery $brandBoundery,
        BrandValidator $brandValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->repository           = $brandUpdateRepository;
        $this->boundery             = $brandBoundery;
        $this->validator            = $brandValidator;
        $this->validateException    = $validateException;
        $this->serverException      = $serverException;
    }

    public function handler(int $id)
    {
        $this->updateIfDataAreValids($id);
    }

    private function updateIfDataAreValids($id)
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        $this->save($id);
    }

    private function save($id)
    {
        try {
            $this->repository->update($id, $this->boundery);
        } catch (\Exception $e) {
            $this->serverException->setMessage('The name is already in use!');

            throw $this->serverException;
        }
    }
}