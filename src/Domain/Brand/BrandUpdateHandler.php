<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Exception\ServerException;
use SRC\Domain\Exception\ValidateException;

/**
 * Class BrandUpdateHandler
 * @package SRC\Domain\Brand
 */
class BrandUpdateHandler
{
    /**
     * @var BrandUpdateRepository
     */
    private BrandUpdateRepository $repository;

    /**
     * @var BrandBoundery
     */
    private BrandBoundery $boundery;

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
     * BrandUpdateHandler constructor.
     * @param BrandUpdateRepository $brandUpdateRepository
     * @param BrandBoundery $brandBoundery
     * @param BrandValidator $brandValidator
     * @param ValidateException $validateException
     * @param ServerException $serverException
     */
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

    /**
     * @param int $id
     * @throws ValidateException
     */
    public function handler(int $id)
    {
        $this->updateIfDataAreValids($id);
    }

    /**
     * Update brand data by id.
     *
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