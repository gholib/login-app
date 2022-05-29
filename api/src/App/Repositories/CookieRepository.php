<?php


namespace App\Repositories;


class CookieRepository
{
    public static function set($key, $value, $exp, $httponly = false)
    {
        setcookie($key, $value, [
            'expires' => $exp,
            'path' => '/',
            'httponly' => $httponly
        ]);
    }

    public static function remove(array $keys)
    {
        foreach ($keys as $key) {
            setcookie($key, '', [
                'expires' => time() - 3600,
                'path' => '/',
                'httponly' => true
            ]);
        }
    }
}