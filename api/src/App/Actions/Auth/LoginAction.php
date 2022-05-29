<?php

namespace App\Actions\Auth;

use App\Actions\AAction;
use App\Repositories\UserRepository;
use Core\Validator\RequestValidator;
use Exception;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class LoginAction extends AAction
{
    /**
     * @param ServerRequestInterface $request
     * @return JsonResponse
     * @throws Exception
     */
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        $parsedBody = $request->getParsedBody();

        $result = RequestValidator::validate([
            'username' => 'required',
            'password' => 'required'
        ], $parsedBody);

        if (!empty($result)) {
            return $this->JsonResponse([], 422, 'Validation error', $result);
        }
        $rememberMe = isset($parsedBody['remember']) ? $parsedBody['remember'] : 0;
        $res = UserRepository::login($parsedBody['username'], $parsedBody['password'], $rememberMe);
        if ($res === null) {
            return $this->JsonResponse([], 422, 'Invalid credentials', [
                'Invalid password or username'
            ]);
        }
        if (empty($res)) {
            return $this->JsonResponse([], 422, 'Account not found', [
                'Account not found'
            ]);
        }

        return $this->JsonResponse($res);
    }
}