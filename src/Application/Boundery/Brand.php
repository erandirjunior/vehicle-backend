<?php

namespace SRC\Application\Boundery;

class Brand implements \SRC\Domain\Brand\Interfaces\BrandBoundery
{
    private $name;

    /**
     * Brand constructor.
     * @param $name
     */
    public function __construct($name = '')
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}