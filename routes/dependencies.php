<?php

use SRC\Domain\Brand\Interfaces\ContactFindRepository;

$brandRepository = new \SRC\Infrastructure\Repository\BrandRepository(
    (new \SRC\Infrastructure\Database\Connection())->getConnection()
);
$modelRepository = new \SRC\Infrastructure\Repository\ModelRepository(
    (new \SRC\Infrastructure\Database\Connection())->getConnection()
);

return [
    \SRC\Domain\Brand\Interfaces\BrandCreateRepository::class => $brandRepository,
    \SRC\Domain\Brand\Interfaces\BrandFindAllRepository::class => $brandRepository,
    \SRC\Domain\Brand\Interfaces\BrandFindRepository::class => $brandRepository,
    \SRC\Domain\Brand\Interfaces\BrandDeleteRepository::class => $brandRepository,
    \SRC\Domain\Brand\Interfaces\BrandUpdateRepository::class => $brandRepository,
    \SRC\Domain\Brand\Interfaces\BrandValidator::class => new \SRC\Infrastructure\Validator\BrandValidator(),
    \SRC\Domain\Model\Interfaces\ModelCreateRepository::class => $modelRepository,
    \SRC\Domain\Model\Interfaces\ModelFindAllRepository::class => $modelRepository,
    \SRC\Domain\Model\Interfaces\ModelFindRepository::class => $modelRepository,
    \SRC\Domain\Model\Interfaces\ModelDeleteRepository::class => $modelRepository,
    \SRC\Domain\Model\Interfaces\ModelUpdateRepository::class => $modelRepository,
    \SRC\Domain\Model\Interfaces\ModelValidator::class => new \SRC\Infrastructure\Validator\ModelValidator()
];