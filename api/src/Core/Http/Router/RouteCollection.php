<?php


namespace Core\Http\Router;


use Core\Http\Router\Route\RegexRoute;
use Core\Http\Router\Route\IRoute;

class RouteCollection
{

    private $routes = [];

    public function addRoute(IRoute $route): void
    {
        $this->routes[] = $route;
    }

    public function get($name, $pattern, $handler, array $tokens = [])
    {
        $r = new RegexRoute($name, $pattern, $handler, ['GET'], $tokens);
        $this->addRoute($r);
        return $r;
    }

    public function post($name, $pattern, $handler, array $tokens = [])
    {
        $r = new RegexRoute($name, $pattern, $handler, ['POST'], $tokens);
        $this->addRoute($r);
        return $r;
    }

    public function delete($name, $pattern, $handler, array $tokens = [])
    {
        $r = new RegexRoute($name, $pattern, $handler, ['DELETE', 'OPTIONS'], $tokens);
        $this->addRoute($r);
        return $r;
    }

    /**
     * @return RegexRoute[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}