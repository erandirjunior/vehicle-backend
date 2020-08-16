<?php

namespace SRC\Test\Classes;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;

class BrandExpectionRepository implements
    BrandCreateRepository,
    BrandUpdateRepository,
    BrandDeleteRepository
{
    private $return = true;

    public function setReturn($return): void
    {
        $this->return = $return;
    }

    public function create(BrandBoundery $brandBoundery): bool
    {
        throw new \Exception();
    }

    public function findByBrandName(string $name): bool
    {
        return false;
    }

    public function delete($id): bool
    {
        throw new \Exception();
    }

    public function update(int $id, BrandBoundery $brandBoundery): bool
    {
        throw new \Exception();
    }

    public function checkIfUniqueBrandName(int $id, string $name)
    {
        return false;
    }
}