<?php

namespace Core\Validator;

use Exception;

class RequestValidator
{
    /**
     * @param array $rules
     * @param array $body
     * @return array
     * @throws Exception
     */
    public static function validate(array $rules, array $body)
    {
        $errors = [];
        foreach ($rules as $key => $rule) {
            if (!method_exists(Rule::class, $rule)) {
                throw new Exception('Invalid rule type!');
            }

            if (!isset($body[$key]) || !Rule::$rule($body[$key])) {
                $errors[] = Message::$rule($key);
            }
        }

        return $errors;
    }
}