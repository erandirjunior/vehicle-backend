<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\Response;

class BrandDeleteHandler
{
    private $repository;

    private $response;

    public function __construct(BrandDeleteRepository $BrandDeleteRepository, Response $response)
    {
        $this->repository = $BrandDeleteRepository;
        $this->response = $response;
    }

    public function delete($id)
    {
        $this->response->setBody([]);
        $this->response->setCode(204);

        if (!$this->repository->delete($id)) {
            $this->response->setBody(['Houve um erro ao excluir o Brande!']);
            $this->response->setCode(500);
        }
    }
}