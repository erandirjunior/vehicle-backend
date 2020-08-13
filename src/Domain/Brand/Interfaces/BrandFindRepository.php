<?php

namespace SRC\Domain\Brand\Interfaces;

interface BrandFindRepository
{
    public function findById($id): array;
}