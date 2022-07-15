<?php

namespace App;

use App\View\Show404;

class Router
{
    protected array $routes = [];
    public function get($path, $cb): void
    {
        $this->routes['get'][$path] = $cb;
    }
    public function post($path, $cb): void
    {
        $this->routes['post'][$path] = $cb;
    }
    public function resolve(): void
    {
        $path = Util::getPath();
        $method = strtolower($_SERVER["REQUEST_METHOD"]);
        $callback = $this->routes[$method][$path] ?? false;
        if(!$callback) {
            http_response_code(404);
            (new Show404())->render();
            return;
        }
        call_user_func($callback);
    }
}