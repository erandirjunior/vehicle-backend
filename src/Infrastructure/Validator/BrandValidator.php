<?php

namespace SRC\Infrastructure\Validator;

/**
 * Class BrandValidator
 * @package SRC\Infrastructure\Validator
 */
class BrandValidator implements \SRC\Domain\Brand\Interfaces\BrandValidator
{
    /**
     * @var array
     */
    private $errors;

    /**
     * BrandValidator constructor.
     */
    public function __construct()
    {
        $this->errors = [];
    }

    /**
     * @param \SRC\Domain\Brand\Interfaces\BrandBoundery $brandBoundery
     * @return bool
     */
    public function validate(\SRC\Domain\Brand\Interfaces\BrandBoundery $brandBoundery): bool
    {
        if (empty($brandBoundery->getName())) {
            $this->errors[] = 'Field name cannot be empty';
        }

        return !!$this->errors;
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

}