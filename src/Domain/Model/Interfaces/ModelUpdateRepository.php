<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelUpdateRepository
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelUpdateRepository
{
    /**
     * @param int $id
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
    public function update(int $id, ModelBoundery $modelBoundery): bool;
}