<?php

namespace SRC\Domain\Brand\Interfaces;

/**
 * Interface BrandCreateRepository
 * @package SRC\Domain\Brand\Interfaces
 */
interface BrandCreateRepository
{
    /**
     * @param BrandBoundery $brandBoundery
     * @return bool
     */
    public function create(BrandBoundery $brandBoundery): bool;

    /**
     * @param string $name
     * @return bool
     */
    public function findByBrandName(string $name): bool;
}