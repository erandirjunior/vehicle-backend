<?php

namespace SRC\Domain\Exception;

/**
 * Class DomainException
 * @package SRC\Domain\Exception
 */
abstract class DomainException extends \Exception
{
    /**
     * @param $message
     * @return mixed
     */
    public abstract function setMessage($message);
}