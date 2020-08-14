<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelValidator
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelValidator
{
    /**
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function validate(ModelBoundery $modelBoundery): bool;

    /**
     * @return array
     */
    public function errors(): array;
}