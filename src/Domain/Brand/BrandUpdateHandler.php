<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;
use SRC\Domain\Brand\Interfaces\BrandValidator;
use SRC\Domain\Brand\Interfaces\ContactCreateRepository;
use SRC\Domain\Brand\Interfaces\ContactDeleteRepository;
use SRC\Domain\Brand\Interfaces\ContactUpdateRepository;
use SRC\Domain\Brand\Interfaces\Response;

class BrandUpdateHandler
{
    private $repository;

    private $boundery;

    private $validator;

    private $response;
    public function __construct(
        BrandUpdateRepository $BrandUpdateRepository,
        BrandBoundery $BrandBoundery,
        BrandValidator $BrandValidator,
        Response $response
    )
    {
        $this->repository               = $BrandUpdateRepository;
        $this->boundery                 = $BrandBoundery;
        $this->validator                = $BrandValidator;
        $this->response                 = $response;
    }

    public function update(int $id)
    {
        $this->updateIfDataAreValids($id);

        return $this->response;
    }

    private function updateIfDataAreValids($id)
    {
        if ($this->validator->validate($this->boundery)) {
            $this->setResponse($this->validator->errors(), 400);

            return;
        }

        return $this->updateIfUniqueBrandName($id);
    }

    private function updateIfUniqueBrandName($id)
    {
        if ($this->repository->checkIfHasOtherBrandWithTheSameName($id, $this->boundery->getName())) {
            $this->setResponse(['Já existe um Brande com esse CPF/CNPJ!'], 400);

            return;
        }

        return $this->save($id);
    }

    private function save($id)
    {
        $this->setResponse(['Houve um erro ao cadastrar o Brande'], 500);

        if ($this->repository->update($id, $this->boundery)) {
            $this->setResponse([], 204);
        }
    }

    private function setResponse($msg = [], $code = 200)
    {
        $this->response->setBody(['msg' => $msg]);
        $this->response->setCode($code);
    }
}