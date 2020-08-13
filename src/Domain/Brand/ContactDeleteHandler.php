<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\ContactDeleteRepository;

class ContactDeleteHandler
{
    private $repository;

    public function __construct(ContactDeleteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $BrandId, string $ids)
    {
        $this->repository->delete($BrandId, $ids);
    }
}