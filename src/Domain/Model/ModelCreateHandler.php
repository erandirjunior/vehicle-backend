<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelBoundery;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Exception\ServerException;
use SRC\Domain\Model\Interfaces\ModelCreateRepository;
use SRC\Domain\Model\Interfaces\ModelValidator;

/**
 * Class ModelCreateHandler
 * @package SRC\Domain\Model
 */
class ModelCreateHandler
{
    /**
     * @var ModelBoundery
     */
    private ModelBoundery $boundery;

    /**
     * @var ModelCreateRepository
     */
    private ModelCreateRepository $repository;

    /**
     * @var ModelValidator
     */
    private ModelValidator $validator;

    /**
     * @var ValidateException
     */
    private ValidateException $validateException;

    /**
     * @var ServerException
     */
    private ServerException $serverException;

    /**
     * ModelCreateHandler constructor.
     * @param ModelBoundery $modelBoundery
     * @param ModelCreateRepository $modelCreateRepository
     * @param ModelValidator $modelValidator
     * @param ValidateException $validateException
     * @param ServerException $serverException
     */
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

    /**
     * Save new model.
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

        $this->createIfUniqueModelName();
    }

    /**
     * @throws ServerException
     * @throws ValidateException
     */
    private function createIfUniqueModelName()
    {
        if ($this->repository->findByModelName($this->boundery->getName())) {
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