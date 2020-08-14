<?php

namespace SRC\Infrastructure\Validator;

use SRC\Domain\Model\Interfaces\ModelBoundery;

/**
 * Class ModelValidator
 * @package SRC\Infrastructure\Validator
 */
class ModelValidator implements \SRC\Domain\Model\Interfaces\ModelValidator
{
    /**
     * @var array
     */
    private $errors;

    /**
     * ModelValidator constructor.
     */
    public function __construct()
    {
        $this->errors = [];
    }

    /**
     * @param ModelBoundery $modelBoundery
     * @return bool
     */
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

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

}