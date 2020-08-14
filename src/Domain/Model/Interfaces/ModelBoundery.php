<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelBoundery
{
    public function getName(): string;

    public function getBrandId(): int;
}