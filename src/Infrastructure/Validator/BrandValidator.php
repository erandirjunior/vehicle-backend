<?php

namespace SRC\Infrastructure\Validator;

class BrandValidator implements \SRC\Domain\Brand\Interfaces\BrandValidator
{
    private $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function validate(\SRC\Domain\Brand\Interfaces\BrandBoundery $BrandBoundery): bool
    {
        if (empty($BrandBoundery->getName())) {
            $this->errors[] = 'Field name cannot be empty';
        }

        return !!$this->errors;
    }

    public function errors(): array
    {
        return $this->errors;
    }

}