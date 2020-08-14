<?php

namespace SRC\Application\Boundery;

use SRC\Domain\Model\Interfaces\ModelBoundery;

class Model implements ModelBoundery
{
    private $name;

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

    private function setName($name)
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

    private function setBrandId($brandId)
    {
        if (empty($brandId)) {
            throw new \Exception('Brand Id cannot be empty!', 400);
        }

        $this->brandId = $brandId;
    }

    public function getBrandId(): int
    {
        return $this->brandId;
    }
}