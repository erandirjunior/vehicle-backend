<?php

namespace SRC\Test;

use PHPUnit\Framework\TestCase;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Domain\Brand\BrandCreateHandler;
use SRC\Domain\Brand\BrandDeleteHandler;
use SRC\Domain\Brand\BrandUpdateHandler;
use SRC\Infrastructure\Validator\BrandValidator;
use SRC\Test\Classes\BrandBoundery;
use SRC\Test\Classes\BrandExpectionRepository;

class BrandExceptionTest extends TestCase
{
    private $serverException;

    private $validateException;

    private $repository;

    private $validator ;

    protected function setUp()
    {
        $this->serverException = new ServerException();
        $this->validateException = new ValidateException();
        $this->repository = new BrandExpectionRepository();
        $this->validator = new BrandValidator();
    }

    public function testCreateValidateException()
    {
        $this->expectException(ValidateException::class);
        $brand = new BrandBoundery('');
        $domain = new BrandCreateHandler(
            $brand,
            $this->repository,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $domain->handler();
    }

    public function testCreateServerException()
    {
        $this->expectException(ServerException::class);
        $this->repository->setReturn(false);
        $brand = new BrandBoundery('test');
        $domain = new BrandCreateHandler(
            $brand,
            $this->repository,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $domain->handler();
    }

    /*public function testFindAll()
    {
        $domain = new BrandFindAllHandler($this->repository);

        $expected = [
            [
                "id" => 1,
                "name" => "Alfa Romeo"
            ],
            [
                "id" => 2,
                "name" => "Ferrari"
            ]
        ];

        $this->assertEquals($expected, $domain->handler());
    }

    public function testFindById()
    {
        $domain = new BrandFindHandler($this->repository);

        $expected = [
            "id" => 2,
            "name" => "Ferrari"
        ];

        $this->assertEquals($expected, $domain->handler(2));
    }*/

    public function testDeleteException()
    {
        $this->expectException(ServerException::class);
        $domain = new BrandDeleteHandler($this->repository, $this->serverException);
        $domain->handler(1);
    }

    public function testUpdateException()
    {
        $this->expectException(ServerException::class);
        $brand = new BrandBoundery('Audi');
        $domain = new BrandUpdateHandler(
            $this->repository,
            $brand,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $domain->handler(1);
    }
}