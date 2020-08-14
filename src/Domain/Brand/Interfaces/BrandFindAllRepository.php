<?php

namespace SRC\Domain\Brand\Interfaces;

/**
 * Interface BrandFindAllRepository
 * @package SRC\Domain\Brand\Interfaces
 */
interface BrandFindAllRepository
{
    /**
     * @return array
     */
    public function findAll(): array;
}