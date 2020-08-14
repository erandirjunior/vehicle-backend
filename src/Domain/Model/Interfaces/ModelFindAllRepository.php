<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelFindAllRepository
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelFindAllRepository
{
    /**
     * @return array
     */
    public function findAll(): array;
}