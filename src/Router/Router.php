<?php

namespace Router;

class Router {

    private array $routesPost;
    private array $routesGet;
    private string $defaultPath;

    private Response $response;

    /**
     * Default constructor
     *
     * @param string $defaultPath Default view if redirection failed
     */
    public function __construct(string $defaultPath) {
        $this->routesPost = [];
        $this->routesGet  = [];

        $this->defaultPath = $defaultPath;

        $this->response = new Response();
    }

    /**
     * Return instance of Response object
     *
     * @return Response
     */
    public function getResponseInstance() : Response {
        return $this->response;
    }

    /**
     * sets new GET path
     *
     * @param string $path  Request path
     * @param callable $callback Action on request
     * @return void
     */
    public function get(string $path, callable $callback) : void {
        $this->routesGet[$path] = $callback;
    }


    /**
     * Sets new POST path
     *
     * @param string $path Request path
     * @param callable $callback Action on request
     * @return void
     */
    public function post(string $path, callable $callback) : void {
        $this->routesPost[$path] = $callback;
    }

    /**
     * Sets new action on both GET & POST requests
     *
     * @param string $path Request path
     * @param callable $callback Action on request
     * @return void
     */
    public function use(string $path, callable $callback) : void {
        $this->routesGet[$path]  = $callback;
        $this->routesPost[$path] = $callback;
    }


    /**
     * Lets the router redirect to requested path
     *
     * @return void
     */
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