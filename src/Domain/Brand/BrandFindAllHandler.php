<?php

namespace SRC\Domain\Brand;

use SRC\Application\Response\Response;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\ContactFindRepository;

class BrandFindAllHandler
{
    private $repository;

    private $response;

    private $contactRepository;

    /**
     * BrandFindAllHandler constructor.
     * @param $repository
     */
    public function __construct(BrandFindAllRepository $repository, ContactFindRepository $contactFindRepository, Response $response)
    {
        $this->repository = $repository;
        $this->contactRepository = $contactFindRepository;
        $this->response = $response;
    }

    public function findAll()
    {
        $data = $this->repository->findAll();

        $this->response->setCode(200);
        $this->response->setBody($data);
    }
}