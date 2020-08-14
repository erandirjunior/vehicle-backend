<?php

namespace SRC\Domain\Model\Interfaces;

interface ModelDeleteRepository
{
    public function delete($id): bool;
}