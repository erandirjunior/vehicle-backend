<?php

namespace SRC\Application\Response;

class Response implements \SRC\Domain\Brand\Interfaces\Response
{
    private $body;

    private $code;

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body = [])
    {
        $this->body = $body;

        return $this;
    }


    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}