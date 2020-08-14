<?php

namespace SRC\Application\Boundery;

class Brand implements \SRC\Domain\Brand\Interfaces\BrandBoundery
{
    private $name;

    /**
     * Brand constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        if (empty($name)) {
            throw new \Exception('Name cannot be empty!', 400);
        }

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}