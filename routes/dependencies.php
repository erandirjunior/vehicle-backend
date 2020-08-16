<?php

$brandRepository = new \SRC\Infrastructure\Repository\BrandRepository(
    (new \SRC\Infrastructure\Database\Connection())->getConnection()
);

$modelRepository = new \SRC\Infrastructure\Repository\ModelRepository(
    (new \SRC\Infrastructure\Database\Connection())->getConnection()
);

$vehicleRepository = new \SRC\Infrastructure\Repository\VehicleRepository(
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
    \SRC\Domain\Model\Interfaces\ModelFindByBrandRepository::class => $modelRepository,
    \SRC\Domain\Model\Interfaces\ModelValidator::class => new \SRC\Infrastructure\Validator\ModelValidator(),
    \SRC\Domain\Vehicle\Interfaces\VehicleCreateRepository::class => $vehicleRepository,
    \SRC\Domain\Vehicle\Interfaces\VehicleFindAllByModel::class => $vehicleRepository,
    \SRC\Domain\Vehicle\Interfaces\VehicleFindRepository::class => $vehicleRepository,
    \SRC\Domain\Vehicle\Interfaces\VehicleDeleteRepository::class => $vehicleRepository,
    \SRC\Domain\Vehicle\Interfaces\VehicleUpdateRepository::class => $vehicleRepository,
    \SRC\Domain\Vehicle\Interfaces\VehicleValidator::class => new \SRC\Infrastructure\Validator\VehicleValidator()
];