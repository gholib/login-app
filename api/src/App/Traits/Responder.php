<?php

namespace App\Traits;

use Laminas\Diactoros\Response\JsonResponse;

trait Responder
{
    private function meta(int $code, $message, array $error): array
    {
        return [
            'meta' => [
                'errors' => $error,
                'message' => $message,
                'statusCode' => $code,
            ]
        ];
    }

    /**
     * @param array $response
     * @param int|int $code
     * @param null $message
     * @param array $error
     * @return JsonResponse
     */
    public function JsonResponse(array $response = [], int $code = 200, $message = 'ok',  array $error = []): JsonResponse
    {
        $response = $this->meta($code, $message, $error) + ['response' => $response];
        return new JsonResponse($response, $code);
    }

}