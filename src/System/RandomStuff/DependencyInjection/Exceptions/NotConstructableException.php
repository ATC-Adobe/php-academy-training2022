<?php

namespace System\RandomStuff\DependencyInjection\Exceptions;

class NotConstructableException extends \Exception {
    public string $type;

    public function __construct(string $type = '', string $message = "", int $code = 0, ?\Throwable $previous = null) {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    public function __toString() : string { return "$this->type cannot be constructed"; }
}