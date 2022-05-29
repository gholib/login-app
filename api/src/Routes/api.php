<?php

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use App\Actions\User\GetUsersAction;
use Core\Http\Middleware\AuthMiddleware;
use Core\Http\Router\RouteCollection;
use Core\Http\Router\Router;

function initApiRoutes()
{
    $routes = new RouteCollection();
    $auth = new AuthMiddleware();

    $routes->post('login', '/auth', new LoginAction());
    $routes->get('users', '/users', new GetUsersAction())->middleware($auth);
    $routes->delete('logout', '/auth', new LogoutAction())->middleware($auth);
    $routes->get('test', '/test', function () {
       return new \Laminas\Diactoros\Response\JsonResponse(['ok']);
    });


    return new Router($routes);
}