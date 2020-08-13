<?php

namespace SRC\Domain\Brand\Interfaces;

interface BrandFindAllRepository
{
    public function findAll(): array;
}