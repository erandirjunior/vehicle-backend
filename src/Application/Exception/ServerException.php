<?php

namespace SRC\Application\Exception;

/**
 * Class ServerException
 * @package SRC\Application\Exception
 */
class ServerException extends \SRC\Domain\Exception\ServerException
{
    /**
     * @var int
     */
    protected $code = 500;

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}