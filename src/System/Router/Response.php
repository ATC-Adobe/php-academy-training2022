<?php

namespace System\Router;

use JetBrains\PhpStorm\NoReturn;

class Response {
    public function setJsonContent() : void {
        header('Content-Type: application/json; charset=utf-8');
    }

    #[NoReturn]
    public function goTo(string $path) : void {
        header('Location: '.$path);
        die();
    }

    #[NoReturn]
    public function render(string $file) : void {
        include $file;
        die();
    }

    public function send(mixed $message) : void {
        echo $message;
    }

    #[NoReturn]
    public function end(mixed $message) : void {
        echo $message;
        die();
    }
}