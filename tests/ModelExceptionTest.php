<?php

namespace SRC\Test;

use PHPUnit\Framework\TestCase;
use SRC\Application\Exception\ServerException;
use SRC\Application\Exception\ValidateException;
use SRC\Domain\Model\ModelCreateHandler;
use SRC\Domain\Model\ModelDeleteHandler;
use SRC\Domain\Model\ModelUpdateHandler;
use SRC\Infrastructure\Validator\ModelValidator;
use SRC\Test\Classes\ModelBoundery;
use SRC\Test\Classes\ModelExceptionRepository;

class ModelExceptionTest extends TestCase
{
    private $serverException;

    private $validateException;

    private $repository;

    private $validator ;

    protected function setUp()
    {
        $this->serverException = new ServerException();
        $this->validateException = new ValidateException();
        $this->repository = new ModelExceptionRepository();
        $this->validator = new ModelValidator();
    }

    public function testCreateValidateException()
    {
        $this->expectException(ValidateException::class);
        $brand = new ModelBoundery('', 2);
        $domain = new ModelCreateHandler(
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
        $brand = new ModelBoundery('test', 1);
        $domain = new ModelCreateHandler(
            $brand,
            $this->repository,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $domain->handler();
    }

    public function testDeleteException()
    {
        $this->expectException(ServerException::class);
        $domain = new ModelDeleteHandler($this->repository, $this->serverException);
        $domain->handler(1);
    }

    public function testUpdateException()
    {
        $this->expectException(ServerException::class);
        $brand = new ModelBoundery('Uno', 1);
        $domain = new ModelUpdateHandler(
            $this->repository,
            $brand,
            $this->validator,
            $this->validateException,
            $this->serverException
        );

        $domain->handler(1);
    }
}