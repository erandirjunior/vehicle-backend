<?php

namespace SRC\Domain\Brand\Interfaces;

/**
 * Interface BrandValidator
 * @package SRC\Domain\Brand\Interfaces
 */
interface BrandValidator
{
    /**
     * @param BrandBoundery $brandBoundery
     * @return bool
     */
    public function validate(BrandBoundery $brandBoundery): bool;

    /**
     * @return array
     */
    public function errors(): array;
}