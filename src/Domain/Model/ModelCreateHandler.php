<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelBoundery;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Exception\ServerException;
use SRC\Domain\Model\Interfaces\ModelCreateRepository;
use SRC\Domain\Model\Interfaces\ModelValidator;

class ModelCreateHandler
{
    private ModelBoundery $boundery;

    private ModelCreateRepository $repository;

    private ModelValidator $validator;

    private ValidateException $validateException;

    private ServerException $serverException;

    public function __construct(
        ModelBoundery $modelBoundery,
        ModelCreateRepository $modelCreateRepository,
        ModelValidator $modelValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->boundery             = $modelBoundery;
        $this->repository           = $modelCreateRepository;
        $this->validator            = $modelValidator;
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

        $this->createIfUniqueModelName();
    }

    private function createIfUniqueModelName()
    {
        if ($this->repository->findByModelName($this->boundery->getName())) {
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