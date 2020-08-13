<?php

namespace SRC\Domain\Brand\Interfaces;

interface BrandUpdateRepository
{
    public function update(int $id, BrandBoundery $BrandBoundery): bool;

    public function checkIfHasOtherBrandWithTheSameName(int $id, string $identifier): bool;
}