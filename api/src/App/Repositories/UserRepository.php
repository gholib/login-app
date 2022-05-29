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
            'username' => $user->user_name,
            'is_active' => $user->is_active
        ];

        TokenRepository::generateAccessToken($payload);

        if ($rememberMe) {
            TokenRepository::generateRefreshToken($payload);
        }

        return [
            'user' => $payload
        ];
    }
}