<?php

namespace SRC\Domain\Brand\Interfaces;

/**
 * Interface BrandFindRepository
 * @package SRC\Domain\Brand\Interfaces
 */
interface BrandFindRepository
{
    /**
     * @param $id
     * @return array
     */
    public function findById($id): array;
}