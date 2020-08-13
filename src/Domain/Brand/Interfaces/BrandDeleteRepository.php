<?php

namespace SRC\Domain\Brand\Interfaces;

interface BrandDeleteRepository
{
    public function delete($id): bool;
}