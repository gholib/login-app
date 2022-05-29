<?php


namespace Core\Exceptions;


class UnauthorizedException extends MiddlewareException
{
    public function __construct()
    {
        parent::__construct('Unauthorized', 401);
    }
}