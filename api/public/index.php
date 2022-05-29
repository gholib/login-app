<?php

use Core\Http\ResponseSender;
use Core\Exceptions\MiddlewareException;
use Core\Http\Router\Exception\RequestNotMatched;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . "/../vendor/autoload.php";

### Initialization
require_once "init.php";
require_once "src/Routes/api.php";
$router = initApiRoutes();
### Running

$request = ServerRequestFactory::fromGlobals();

try {
    $result = $router->match($request);
    foreach ($result->getAttributes() as $attribute => $value) {
        $request = $request->withAttribute($attribute, $value);
    }
    /** @var callable $action */
    $action = $result->getHandler();
    $response = $action($request);
} catch (RequestNotMatched $e){
    $response = new JsonResponse([
        'statusCode' => 404,
        'message' => 'Page not found'
    ], 404);
} catch (MiddlewareException $e) {
    $response = new JsonResponse([
        'statusCode' => $e->getStatusCode(),
        'message' => $e->getMessage()
    ], $e->getStatusCode());
}


### Sending
$a= new ResponseSender();
$a->send($response);

