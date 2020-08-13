<?php

namespace SRC\Domain\Brand\Interfaces;

interface Response
{
    public function setBody($body = []);

    public function setCode($code);
}