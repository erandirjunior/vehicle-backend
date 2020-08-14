<?php

namespace SRC\Domain\Model\Interfaces;

/**
 * Interface ModelBoundery
 * @package SRC\Domain\Model\Interfaces
 */
interface ModelBoundery
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getBrandId(): int;
}