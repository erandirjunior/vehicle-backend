<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelDeleteRepository
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelDeleteRepository
{
    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool;
}