<?php

namespace SRC\Domain\Model;

use SRC\Domain\Model\Interfaces\ModelBoundery;
use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;
use SRC\Domain\Model\Interfaces\ModelUpdateRepository;
use SRC\Domain\Model\Interfaces\ModelValidator;

/**
 * Class ModelUpdateHandler
 * @package SRC\Domain\Model
 */
class ModelUpdateHandler
{
    /**
     * @var ModelUpdateRepository
     */
    private ModelUpdateRepository $repository;

    /**
     * @var ModelBoundery
     */
    private ModelBoundery $boundery;

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
     * ModelUpdateHandler constructor.
     * @param ModelUpdateRepository $modelUpdateRepository
     * @param ModelBoundery $modelBoundery
     * @param ModelValidator $modelValidator
     * @param ValidateException $validateException
     * @param ServerException $serverException
     */
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

    /**
     * Update model data by id.
     *
     * @param int $id
     * @throws ValidateException
     */
    public function handler(int $id)
    {
        $this->updateIfDataAreValids($id);
    }

    /**
     * @param $id
     * @throws ServerException
     * @throws ValidateException
     */
    private function updateIfDataAreValids($id)
    {
        if ($this->validator->validate($this->boundery)) {
            $this->validateException->setMessage($this->validator->errors());

            throw $this->validateException;
        }

        $this->save($id);
    }

    /**
     * @param $id
     * @throws ServerException
     */
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