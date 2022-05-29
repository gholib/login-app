<?php


namespace Core\Validator;


class Message
{
    public static function required($value)
    {
        return 'The field ' . $value . ' required';
    }

    public static function email(string $value)
    {
        return 'The field ' . $value . ' must be a valid email';
    }
}