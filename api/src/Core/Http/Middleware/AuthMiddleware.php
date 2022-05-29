<?php

namespace Core\Http\Middleware;

use App\Repositories\CookieRepository;
use App\Repositories\TokenRepository;
use Core\Exceptions\UnauthorizedException;
use Psr\Http\Message\ServerRequestInterface;

class AuthMiddleware implements IMiddleware
{
    /**
     * @param ServerRequestInterface $request
     */
    public function chain(ServerRequestInterface $request)
    {
        $header = $request->getHeader('Authorization');
        $cookie = $request->getCookieParams();

        $token = null;
        if (!empty($header)) {
            $token = explode(' ', $header[0])[1];
        } elseif (isset($cookie['access_token'])) {
            $token = $cookie['access_token'];
        }
        $decodeToken = TokenRepository::verify($token);
        if (!$decodeToken && isset($cookie['refresh_token'])) {
            $payload = TokenRepository::verifyRefreshToken($cookie['refresh_token']);

            if ($payload) {
                $payload = [
                    'id' => $payload->id,
                    'user_name' => $payload->username,
                    'is_active' => $payload->is_active
                ];
                TokenRepository::generateAccessToken($payload);
                TokenRepository::generateRefreshToken($payload);
                $request->User = $payload;
            } else {
                throw new UnauthorizedException();
            }
        } elseif(!$decodeToken) {
            CookieRepository::remove(['access_token', 'refresh_token']);
            throw new UnauthorizedException();
        } else {
            $request->User = $decodeToken;
        }

    }
}