<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelFindAllRepository
{
    public function findAll(): array;
}