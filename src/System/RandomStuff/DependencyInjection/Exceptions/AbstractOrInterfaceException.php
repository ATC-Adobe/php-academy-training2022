<?php

namespace System\RandomStuff\DependencyInjection\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class AbstractOrInterfaceException extends \Exception {

    public string $type;

    public function __construct(string $type = '', string $message = "", int $code = 0, ?\Throwable $previous = null) {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    public function __toString() : string { return "$this->type is an Abstract class or an Interface and cannot be created"; }
}
