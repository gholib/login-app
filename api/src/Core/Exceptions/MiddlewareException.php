<?php


namespace Core\Exceptions;


use LogicException;

class MiddlewareException extends LogicException
{
    private $statusCode;

    public function __construct($message,int $statusCode)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}