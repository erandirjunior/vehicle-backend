<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\Response;

class BrandFindHandler
{
    private $repository;

    private $response;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(BrandFindRepository $repository, Response $response)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    public function findById($id)
    {
        $data = $this->repository->findById($id);

        $this->response->setCode(200);
        $this->response->setBody($data);
    }
}