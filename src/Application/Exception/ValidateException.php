<?php

namespace SRC\Application\Exception;

/**
 * Class ValidateException
 * @package SRC\Application\Exception
 */
class ValidateException extends \SRC\Domain\Exception\ValidateException
{
    /**
     * @var int
     */
    protected $code = 400;

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}