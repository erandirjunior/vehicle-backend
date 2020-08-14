<?php

namespace SRC\Application\Exception;

class ValidateException extends \SRC\Domain\Exception\ValidateException
{
    protected $code = 400;

    public function setMessage($message)
    {
        $this->message = $message;
    }
}