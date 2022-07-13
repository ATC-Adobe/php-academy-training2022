<?php

spl_autoload_register(function ($class_name) {
    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__ . '/src';
    $className = str_replace('\\', $ds, $class_name);
    $file = "{$dir}{$ds}{$className}.php";
    if (is_readable($file)) require_once $file;
 });