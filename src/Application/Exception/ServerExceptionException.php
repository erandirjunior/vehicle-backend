<?php

namespace SRC\Application\Exception;

use SRC\Domain\Exception\ServerException;

class ServerExceptionException extends \Exception implements ServerException
{
    protected $code = 500;

    public function setMessage($message)
    {
        $this->message = $message;
    }
}