<?php

namespace Router;

use JetBrains\PhpStorm\NoReturn;

class Response {
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

    public function send(string $message) : void {
        echo $message;
    }

    #[NoReturn]
    public function end(string $message) : void {
        echo $message;
        die();
    }
}