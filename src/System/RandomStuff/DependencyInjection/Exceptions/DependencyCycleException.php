<?php

namespace System\RandomStuff\DependencyInjection\Exceptions;

class DependencyCycleException extends \Exception {
    public string $type;

    public function __construct(string $type = '', string $message = "", int $code = 0, ?\Throwable $previous = null) {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }


    public function __toString() : string { return "Dependency {resolved from $this->type} forms a cycle"; }
}