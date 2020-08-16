<?php

namespace SRC\Test\Classes;

class BrandBoundery implements \SRC\Domain\Brand\Interfaces\BrandBoundery
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}