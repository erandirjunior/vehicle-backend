<?php

namespace SRC\Domain\Brand\Interfaces;

interface BrandValidator
{
    public function validate(BrandBoundery $BrandBoundery): bool;

    public function errors(): array;
}