<?php

namespace SRC\Domain\Model;

use SRC\Domain\Exception\ServerException;
use SRC\Domain\Model\Interfaces\ModelDeleteRepository;

class ModelDeleteHandler
{
    private ModelDeleteRepository $repository;

    private ServerException $serverException;

    public function __construct(
        ModelDeleteRepository $modelDeleteRepository,
        ServerException $serverException
    )
    {
        $this->repository       = $modelDeleteRepository;
        $this->serverException  = $serverException;
    }

    public function handler($id)
    {
        if (!$this->repository->delete($id)) {
            $this->serverException->setMessage('Sorry, there was an error not specificated!');

            throw $this->serverException;
        }
    }
}