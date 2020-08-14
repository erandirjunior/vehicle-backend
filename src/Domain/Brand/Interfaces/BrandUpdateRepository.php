<?php

namespace SRC\Domain\Brand\Interfaces;

/**
 * Interface BrandUpdateRepository
 * @package SRC\Domain\Brand\Interfaces
 */
interface BrandUpdateRepository
{
    /**
     * @param int $id
     * @param BrandBoundery $brandBoundery
     * @return bool
     */
    public function update(int $id, BrandBoundery $brandBoundery): bool;
}