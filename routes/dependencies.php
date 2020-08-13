<?php

use SRC\Domain\Brand\Interfaces\ContactFindRepository;

$BrandRepository = new \SRC\Infrastructure\Repository\BrandRepository(
    (new \SRC\Infrastructure\Database\Connection())->getConnection()
);

return [
    \SRC\Domain\Brand\Interfaces\BrandCreateRepository::class => $BrandRepository,
    \SRC\Domain\Brand\Interfaces\BrandFindAllRepository::class => $BrandRepository,
    \SRC\Domain\Brand\Interfaces\BrandFindRepository::class => $BrandRepository,
    \SRC\Domain\Brand\Interfaces\BrandDeleteRepository::class => $BrandRepository,
    \SRC\Domain\Brand\Interfaces\BrandUpdateRepository::class => $BrandRepository,
    \SRC\Domain\Brand\Interfaces\BrandValidator::class => new \SRC\Infrastructure\Validator\BrandValidator()
];