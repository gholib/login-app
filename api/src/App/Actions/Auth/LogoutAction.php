<?php


namespace App\Actions\Auth;


use App\Actions\AAction;
use App\Repositories\CookieRepository;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class LogoutAction extends AAction
{
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        CookieRepository::remove(['access_token', 'refresh_token', 'remember']);
        return $this->JsonResponse([]);
    }
}