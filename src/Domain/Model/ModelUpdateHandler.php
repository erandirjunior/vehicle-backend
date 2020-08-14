<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelBoundery;
use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Model\Interfaces\ModelUpdateRepository;
use SRC\Domain\Model\Interfaces\ModelValidator;

class ModelUpdateHandler
{
    private ModelUpdateRepository $repository;

    private ModelBoundery $boundery;

    private ModelValidator $validator;

    private ValidateException $validateException;

    private ServerException $serverException;

    public function __construct(
        ModelUpdateRepository $modelUpdateRepository,
        ModelBoundery $modelBoundery,
        ModelValidator $modelValidator,
        ValidateException $validateException,
        ServerException $serverException
    )
    {
        $this->repository           = $modelUpdateRepository;
        $this->boundery             = $modelBoundery;
        $this->validator            = $modelValidator;
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