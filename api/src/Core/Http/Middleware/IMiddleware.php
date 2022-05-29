<?php

namespace Core\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;

interface IMiddleware
{
    /**
     * @param ServerRequestInterface $request
     * @return mixed
     */
    public function chain(ServerRequestInterface $request);
}