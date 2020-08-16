<?php

namespace SRC\Test\Classes;

/**
 * Class Model
 * @package SRC\Application\Boundery
 */
class ModelBoundery implements \SRC\Domain\Model\Interfaces\ModelBoundery
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $brandId;

    /**
     * Brand constructor.
     * @param $name
     */
    public function __construct(string $name, $brandId)
    {
        $this->name  = $name;
        $this->brandId = $brandId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }
}