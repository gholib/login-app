<?php


namespace App\Repositories;


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenRepository
{
    public static function generateAccessToken(array $payload)
    {
        $payload['iat'] = time();
        $payload['exp'] = $payload['iat'] + 60 * 25;
        $token = JWT::encode($payload, JWT_KEY, 'HS256');

        CookieRepository::set('access_token', $token, $payload['exp']);

        return $token;
    }

    public static function generateRefreshToken(array $payload)
    {
        $payload['iat'] = time();
        $payload['exp'] = $payload['iat'] + 60 * 60 * 24 * 7;
        $token = JWT::encode($payload, JWT_REFRESH_KEY, 'HS256');

        CookieRepository::set('refresh_token', $token, $payload['exp'], true);

        return $token;
    }

    public static function verify(?string $token)
    {
        if (!$token) {
            return null;
        }
        try {
            $decoded = JWT::decode($token, new Key(JWT_KEY, 'HS256'));
        } catch (\Exception $e) {
            $decoded = null;
        }
        return $decoded;
    }

    public static function verifyRefreshToken(?string $token)
    {
        if (!$token) {
            return null;
        }
        try {
            $decoded = JWT::decode($token, new Key(JWT_REFRESH_KEY, 'HS256'));
        } catch (\Exception $e) {
            $decoded = null;
        }
        return $decoded;
    }
}