<?php

namespace SRC\Application\Boundery;

use SRC\Domain\Model\Interfaces\ModelBoundery;

/**
 * Class Model
 * @package SRC\Application\Boundery
 */
class Model implements ModelBoundery
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
        $this->setName($name);
        $this->setBrandId($brandId);
    }

    /**
     * @param $name
     * @throws \Exception
     */
    private function setName($name)
    {
        if (empty($name)) {
            throw new \Exception('Name cannot be empty!', 400);
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $brandId
     * @throws \Exception
     */
    private function setBrandId($brandId)
    {
        if (empty($brandId)) {
            throw new \Exception('Brand Id cannot be empty!', 400);
        }

        $this->brandId = $brandId;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }
}