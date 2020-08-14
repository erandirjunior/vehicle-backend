<?php

namespace SRC\Infrastructure\Validator;

use SRC\Domain\Model\Interfaces\ModelBoundery;

class ModelValidator implements \SRC\Domain\Model\Interfaces\ModelValidator
{
    private $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function validate(ModelBoundery $modelBoundery): bool
    {
        if (empty($modelBoundery->getName())) {
            $this->errors[] = 'Field name cannot be empty';
        }

        if (empty($modelBoundery->getBrandId())) {
            $this->errors[] = 'Field brand cannot be empty';
        }

        return !!$this->errors;
    }

    public function errors(): array
    {
        return $this->errors;
    }

}