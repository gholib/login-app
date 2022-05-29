<?php

namespace Core\Validator;

class Rule
{
    public static function required($value)
    {
        return !empty($value);
    }

    public static function email(string $value)
    {
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        return preg_match($pattern, $value);
    }
}