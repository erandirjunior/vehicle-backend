<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelCreateRepository
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelCreateRepository
{
    /**
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function create(ModelBoundery $modelBoundery): bool;

    /**
     * @param string $name
     * @return bool
     */
    public function findByModelName(string $name): bool;
}