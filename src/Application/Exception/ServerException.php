<?php

namespace SRC\Application\Exception;

class ServerException extends \SRC\Domain\Exception\ServerException
{
    protected $code = 500;

    public function setMessage($message)
    {
        $this->message = $message;
    }
}