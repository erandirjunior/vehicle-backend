<?php

namespace SRC\Domain\Exception;

interface DomainException
{
    public function setMessage($message);
}