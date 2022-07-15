<?php

namespace Router;

class Router {

    private array $routesPost;
    private array $routesGet;
    private string $defaultPath;

    private Response $response;

    public function __construct(string $defaultPath) {
        $this->routesPost = [];
        $this->routesGet  = [];

        $this->defaultPath = $defaultPath;

        $this->response = new Response();
    }

    public function getResponseInstance() : Response {
        return $this->response;
    }

    public function get(string $path, callable $callback) : void {
        $this->routesGet[$path] = $callback;
    }

    public function post(string $path, callable $callback) : void {
        $this->routesPost[$path] = $callback;
    }

    public function use(string $path, callable $callback) : void {
        $this->routesGet[$path]  = $callback;
        $this->routesPost[$path] = $callback;
    }

    public function redirect() : void {
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($this->routesPost[$uri])) {
                $this->routesPost[$uri]($this->response);
                return;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($this->routesGet[$uri])) {
                $this->routesGet[$uri]($this->response);
                return;
            }
        }

        $this->response->render(
            $this->defaultPath
        );
    }
}