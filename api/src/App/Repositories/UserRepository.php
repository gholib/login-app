<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public static function login(string $userName, string $password, $rememberMe = false)
    {
        $user = User::where('username', $userName)
            ->first();

        if (!$user) {
            return [];
        }

        $verify = password_verify($password, $user->password);

        if (!$verify) {
            return null;
        }

        $payload = [
            'id' => $user->id,
            'username' => $user->username,
            'is_active' => $user->is_active
        ];

        TokenRepository::generateAccessToken($payload);

        if ($rememberMe) {
            CookieRepository::set('remember', 1, time() + 60 * 60 * 24);
            TokenRepository::generateRefreshToken($payload);
        } else {
            CookieRepository::remove(['remember']);
        }

        return [
            'user' => $payload
        ];
    }
}