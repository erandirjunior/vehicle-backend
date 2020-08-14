<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelUpdateRepository
{
    public function update(int $id, ModelBoundery $modelBoundery): bool;
}