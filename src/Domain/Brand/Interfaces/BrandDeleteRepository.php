<?php

namespace SRC\Domain\Brand\Interfaces;

/**
 * Interface BrandDeleteRepository
 * @package SRC\Domain\Brand\Interfaces
 */
interface BrandDeleteRepository
{
    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool;
}