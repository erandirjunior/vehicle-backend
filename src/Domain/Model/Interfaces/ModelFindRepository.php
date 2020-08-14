<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelFindRepository
{
    public function findById($id): array;
}