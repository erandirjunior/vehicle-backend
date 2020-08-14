<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelValidator
{
    public function validate(ModelBoundery $modelBoundery): bool;

    public function errors(): array;
}