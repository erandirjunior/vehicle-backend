<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelFindByBrandRepository
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelFindByBrandRepository
{
    /**
     * @param $id
     * @return array
     */
    public function findByBrandId($id): array;
}