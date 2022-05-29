<?php


namespace Core\Http\Router\Route;

use Core\Http\Router\Result;
use Psr\Http\Message\ServerRequestInterface;

interface IRoute
{
    public function match(ServerRequestInterface $request): ?Result;
}