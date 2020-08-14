<?php

namespace SRC\Domain\Model;

use SRC\Domain\Exception\ServerException;
use SRC\Domain\Model\Interfaces\ModelDeleteRepository;

/**
 * Class ModelDeleteHandler
 * @package SRC\Domain\Model
 */
class ModelDeleteHandler
{
    /**
     * @var ModelDeleteRepository
     */
    private ModelDeleteRepository $repository;

    /**
     * @var ServerException
     */
    private ServerException $serverException;

    /**
     * ModelDeleteHandler constructor.
     * @param ModelDeleteRepository $modelDeleteRepository
     * @param ServerException $serverException
     */
    public function __construct(
        ModelDeleteRepository $modelDeleteRepository,
        ServerException $serverException
    )
    {
        $this->repository       = $modelDeleteRepository;
        $this->serverException  = $serverException;
    }

    /**
     * Delete model by id.
     *
     * @param $id
     * @throws ServerException
     */
    public function handler($id)
    {
        try {
            $this->repository->delete($id);
        } catch (\Exception $e) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }
    }
}