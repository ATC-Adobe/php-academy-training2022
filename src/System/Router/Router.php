<?php

namespace System\Router;

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
     * @param string $path Request path
     * @param callable ...$callback Action on request
     * @return void
     */
    public function get(string $path, callable ...$callback) : void {
        $this->routesGet[$path] = $callback;
    }


    /**
     * Sets new POST path
     *
     * @param string $path Request path
     * @param callable ...$callback Action on request
     * @return void
     */
    public function post(string $path, callable ...$callback) : void {
        $this->routesPost[$path] = $callback;
    }

    /**
     * Sets new action on both GET & POST requests
     *
     * @param string $path Request path
     * @param callable ...$callback Action on request
     * @return void
     */
    public function use(string $path, callable ...$callback) : void {
        $this->routesGet[$path]  = $callback;
        $this->routesPost[$path] = $callback;
    }


    public function stage(string $path, string $filename) : void {
        $callback = function (Response $res) use ($filename) {
            $_REQUEST['iterator']->next();
            include $filename;
        };

        $this->use($path, $callback);
    }

    /**
     * Lets the router redirect to requested path
     *
     * @return void
     */
    public function redirect() : void {

        //$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

        /* Multilevel router implementation*/
        if(!isset($_REQUEST['iterator'])) {
            $uri = explode('?', $_SERVER['REQUEST_URI'])[0];

            $_REQUEST['iterator'] = new \ArrayIterator(
                explode('/', $uri)
            );

            $_REQUEST['iterator']->next();
        }

        $uri = '/' . $_REQUEST['iterator']->current();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($this->routesPost[$uri])) {
                foreach ($this->routesPost[$uri] as $route) {
                    $route($this->response);
                }
                return;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($this->routesGet[$uri])) {
                foreach ($this->routesGet[$uri] as $route) {
                    $route($this->response);
                }
                return;
            }
        }

        $this->response->render(
            $this->defaultPath
        );
    }
}