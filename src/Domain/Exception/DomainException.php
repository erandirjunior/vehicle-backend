<?php

namespace SRC\Domain\Exception;

abstract class DomainException extends \Exception
{
    public abstract function setMessage($message);
}