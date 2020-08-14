<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelFindRepository
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelFindRepository
{
    /**
     * @param $id
     * @return array
     */
    public function findById($id): array;
}