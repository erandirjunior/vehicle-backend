<?php

namespace SRC\Test;

use PHPUnit\Framework\TestCase;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Domain\Model\ModelCreateHandler;
use SRC\Domain\Model\ModelDeleteHandler;
use SRC\Domain\Model\ModelFindAllHandler;
use SRC\Domain\Model\ModelFindHandler;
use SRC\Domain\Model\ModelUpdateHandler;
use SRC\Infrastructure\Validator\ModelValidator;
use SRC\Test\Classes\ModelRepository;
use SRC\Test\Classes\ModelBoundery;

class VehicleExceptionTest extends TestCase
{
    private $serverException;

    private $validateException;

    private $repository;

    private $validator ;

    protected function setUp()
    {
        $this->serverException = new ServerException();
        $this->validateException = new ValidateException();
        $this->repository = new ModelRepository();
        $this->validator = new ModelValidator();
    }

    public function testCreate()
    {
        $model = new ModelBoundery('Ferrari', 1);
        $domain = new ModelCreateHandler(
            $model,
            $this->repository,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $this->assertEquals(true, $domain->handler());
    }

    public function testFindAll()
    {
        $domain = new ModelFindAllHandler($this->repository);

        $expected = [
            [
                "name" => "AMAROK CD2.0 16V/S CD2.0 16V TDI 4x2 Die",
                "id" => 1
            ],
            [
                "name" => "AMAROK CD2.0 16V/S CD2.0 16V TDI 4x4 Die",
                "id" => 2
            ],
            [
                "name" => "AMAROK CS2.0 16V/S2.0 16V TDI 4x2 Diesel",
                "id" => 3
            ]
        ];

        $this->assertEquals($expected, $domain->handler());
    }

    public function testFindById()
    {
        $domain = new ModelFindHandler($this->repository);

        $expected = [
            "name" => "AMAROK CS2.0 16V/S2.0 16V TDI 4x2 Diesel",
            "id" => 2
        ];

        $this->assertEquals($expected, $domain->handler(3));
    }

    public function testDelete()
    {
        $domain = new ModelDeleteHandler($this->repository, $this->serverException);

        $this->assertEquals(true, $domain->handler(1));
    }

    public function testUpdate()
    {
        $model = new ModelBoundery('Gol', 2);
        $domain = new ModelUpdateHandler(
            $this->repository,
            $model,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $this->assertEquals(true, $domain->handler(1));
    }
}