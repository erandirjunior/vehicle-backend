<?php

namespace SRC\Domain\Brand\Interfaces;

interface BrandCreateRepository
{
    public function create(BrandBoundery $BrandBoundery): bool;

    public function findByBrandName(string $name): bool;
}