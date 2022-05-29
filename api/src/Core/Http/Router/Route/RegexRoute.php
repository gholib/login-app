<?php
namespace Core\Http\Router\Route;

use Core\Http\Middleware\IMiddleware;
use Core\Http\Router\Result;
use Psr\Http\Message\ServerRequestInterface;

class RegexRoute implements IRoute
{
    private $name;
    private $pattern;
    private $handler;
    private $tokens;
    private $methods;
    private ?IMiddleware $middleware = null;

    public function __construct($name, $pattern, $handler, array $methods, array $tokens = [])
    {
        $this->name = $name;
        $this->pattern = $pattern;
        $this->handler = $handler;
        $this->tokens = $tokens;
        $this->methods = $methods;
    }

    public function match(ServerRequestInterface $request): ?Result
    {
        if ($this->methods && !\in_array($request->getMethod(), $this->methods, true)) {
            return null;
        }

        $pattern = preg_replace_callback('~\{([^\}]+)\}~', function ($matches) {
            $argument = $matches[1];
            $replace = $this->tokens[$argument] ?? '[^}]+';
            return '(?P<' . $argument . '>' . $replace . ')';
        }, $this->pattern);

        $path = $request->getUri()->getPath();

        if (!preg_match('~^' . $pattern . '$~i', $path, $matches)) {
            return null;
        }

        if ($this->middleware) {
            $this->middleware->chain($request);
        }

        return new Result(
            $this->name,
            $this->handler,
            array_filter($matches, '\is_string', ARRAY_FILTER_USE_KEY)
        );
    }

    public function middleware(IMiddleware $middleware)
    {
        $this->middleware = $middleware;
    }

}