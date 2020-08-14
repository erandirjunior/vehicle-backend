<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelCreateRepository
{
    public function create(ModelBoundery $modelBoundery): bool;

    public function findByModelName(string $name): bool;
}