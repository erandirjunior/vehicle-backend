<?php

namespace SRC\Test\Classes;

use SRC\Domain\Brand\Interfaces\BrandBoundery;
use SRC\Domain\Brand\Interfaces\BrandCreateRepository;
use SRC\Domain\Brand\Interfaces\BrandDeleteRepository;
use SRC\Domain\Brand\Interfaces\BrandFindAllRepository;
use SRC\Domain\Brand\Interfaces\BrandFindRepository;
use SRC\Domain\Brand\Interfaces\BrandUpdateRepository;

class BrandRepository implements
    BrandCreateRepository,
    BrandUpdateRepository,
    BrandDeleteRepository,
    BrandFindAllRepository,
    BrandFindRepository
{
    public function create(BrandBoundery $brandBoundery): bool
    {
        return true;
    }

    public function findByBrandName(string $name): bool
    {
        return false;
    }

    public function delete($id): bool
    {
        return true;
    }

    public function findAll(): array
    {
        return [
            [
                "id" => 1,
                "name" => "Alfa Romeo"
            ],
            [
                "id" => 2,
                "name" => "Ferrari"
            ]
        ];
    }

    public function findById($id): array
    {
       $data = [
           [
               "id" => 1,
               "name" => "Alfa Romeo"
           ],
           [
               "id" => 2,
               "name" => "Ferrari"
           ]
       ];

       return $data[$id - 1];
    }

    public function update(int $id, BrandBoundery $brandBoundery): bool
    {
        return true;
    }

    public function checkIfUniqueBrandName(int $id, string $name)
    {
        return false;
    }
}