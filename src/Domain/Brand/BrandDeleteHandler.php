<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\Response;
use SRC\Domain\Exception\ServerException;

class BrandDeleteHandler
{
    private BrandDeleteRepository $repository;

    private ServerException $serverException;

    public function __construct(
        BrandDeleteRepository $BrandDeleteRepository,
        ServerException $serverException
    )
    {
        $this->repository       = $BrandDeleteRepository;
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