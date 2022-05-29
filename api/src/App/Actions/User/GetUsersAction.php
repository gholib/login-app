<?php


namespace App\Actions\User;


use App\Actions\AAction;
use App\Models\Student;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class GetUsersAction extends AAction
{
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        $params = $request->getQueryParams();
        $students = Student::paginate(5, ['*'],'page', $params['page'])
            ->toArray();

        return $this->JsonResponse($students);
    }
}