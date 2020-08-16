<?php

namespace SRC\Test;

use PHPUnit\Framework\TestCase;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Domain\Vehicle\VehicleCreateHandler;
use SRC\Domain\Vehicle\VehicleDeleteHandler;
use SRC\Domain\Vehicle\VehicleFindByModelHandler;
use SRC\Domain\Vehicle\VehicleFindHandler;
use SRC\Domain\Vehicle\VehicleUpdateHandler;
use SRC\Infrastructure\Validator\VehicleValidator;
use SRC\Test\Classes\VehicleBoundery;
use SRC\Test\Classes\VehicleRepository;

class VehicleTest extends TestCase
{
    private $serverException;

    private $validateException;

    private $repository;

    private $validator ;

    protected function setUp()
    {
        $this->serverException = new ServerException();
        $this->validateException = new ValidateException();
        $this->repository = new VehicleRepository();
        $this->validator = new VehicleValidator();
    }

    public function testCreate()
    {
        $vehicle = new VehicleBoundery(100000, 1, 1, 2020, "Gasolina");
        $domain = new VehicleCreateHandler(
            $vehicle,
            $this->repository,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $this->assertEquals(true, $domain->handler());
    }

    public function testFindAllByModel()
    {
        $domain = new VehicleFindByModelHandler($this->repository);

        $expected = [
            [
                "id" => 1,
                "value" => "R$ 10.254,00",
                "brand" => "Acura",
                "model" => "Integra GS 1.8",
                "yearModel" => 1992,
                "fuel" => "Gasolina"
            ],
            [
                "id" => 2,
                "value" => "R$ 11.532,00",
                "brand" => "Alfa Romeo",
                "model" => "Integra GS 1.8",
                "yearModel" => 2020,
                "fuel" => "Gasolina"
            ]
        ];

        $this->assertEquals($expected, $domain->handler(1));
    }

    public function testFindById()
    {
        $domain = new VehicleFindHandler($this->repository);

        $expected = [
            "id" => 1,
            "value" => 10254.00,
            "brandId" => 1,
            "modelId" => 1,
            "yearModel" => 1992,
            "fuel" => "Gasolina"
        ];

        $this->assertEquals($expected, $domain->handler(1));
    }

    public function testDelete()
    {
        $domain = new VehicleDeleteHandler($this->repository, $this->serverException);

        $this->assertEquals(true, $domain->handler(1));
    }

    public function testUpdate()
    {
        $vehicle = new VehicleBoundery(100000, 1, 1, 2020, "Gasolina");
        $domain = new VehicleUpdateHandler(
            $this->repository,
            $vehicle,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $this->assertEquals(true, $domain->handler(1));
    }
}