<?php

namespace Core\Http;

use Psr\Http\Message\ResponseInterface;

class ResponseSender
{
    public function send(ResponseInterface $response): void
    {
        $this->cors();
        header(sprintf(
            'HTTP/%s %d %s',
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        ));
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }
        echo $response->getBody()->getContents();
    }

    private function cors()
    {
        header("Access-Control-Allow-Origin: " . CLIENT_URL);
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Credentials: true');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
        header('Access-Control-Max-Age: 86400');
        header('Accept: application/json');
    }
}