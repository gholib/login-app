<?php


namespace Core\Http\Router;


use Core\Http\Router\Exception\RequestNotMatched;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    private RouteCollection $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    public function match(ServerRequestInterface $request): Result
    {
        foreach ($this->routes->getRoutes() as $route) {
            if ($result = $route->match($request)) {
                return $result;
            }
        }

        throw new RequestNotMatched($request);
    }

}
