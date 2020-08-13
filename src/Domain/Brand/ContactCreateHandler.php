<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\ContactCreateRepository;

class ContactCreateHandler
{
    private $repository;

    public function __construct(ContactCreateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($BrandId, $contact)
    {
        return $this->repository->create($BrandId, $contact);
    }
}