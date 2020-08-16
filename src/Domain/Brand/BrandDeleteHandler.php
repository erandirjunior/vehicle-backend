<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Exception\ServerException;

/**
 * Class BrandDeleteHandler
 * @package SRC\Domain\Brand
 */
class BrandDeleteHandler
{
    /**
     * @var BrandDeleteRepository
     */
    private BrandDeleteRepository $repository;

    /**
     * @var ServerException
     */
    private ServerException $serverException;

    /**
     * BrandDeleteHandler constructor.
     * @param BrandDeleteRepository $brandDeleteRepository
     * @param ServerException $serverException
     */
    public function __construct(
        BrandDeleteRepository $brandDeleteRepository,
        ServerException $serverException
    )
    {
        $this->repository       = $brandDeleteRepository;
        $this->serverException  = $serverException;
    }

    /**
     * Delete brand by id.
     *
     * @param $id
     * @throws ServerException
     */
    public function handler($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (\Exception $e) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }
    }
}