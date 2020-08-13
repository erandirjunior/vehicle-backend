<?php

namespace SRC\Domain\Brand;

use SRC\Domain\Brand\Interfaces\ContactCreateRepository;
use SRC\Domain\Brand\Interfaces\ContactDeleteRepository;
use SRC\Domain\Brand\Interfaces\ContactUpdateRepository;

class ContactUpdateHandler
{
    private $repository;

    private $contactCreate;

    private $contactDelete;

    public function __construct(
        ContactUpdateRepository $repository,
        ContactCreateRepository $contactCreateRepository,
        ContactDeleteRepository $contactDeleteRepository
    )
    {
        $this->repository = $repository;
        $this->contactCreate = new ContactCreateHandler($contactCreateRepository);
        $this->contactDelete = new ContactDeleteHandler($contactDeleteRepository);
    }

    public function update($BrandId, $data)
    {
        $ids = [];
        foreach ($data as $contact) {
            if (empty($contact['id'])) {
                $ids[] = $this->contactCreate->create($BrandId, $contact);

                continue;
            }

            $this->repository->update($BrandId, $contact);
            $ids[] = $contact['id'];
        }

        $this->contactDelete->delete($BrandId, implode(', ', $ids));
    }
}