<?php

namespace SRC\Application\Exception;

class ValidateException extends \Exception implements \SRC\Domain\Exception\ValidateException
{
    protected $code = 400;

    public function setMessage($message)
    {
        $this->message = $message;
    }
}