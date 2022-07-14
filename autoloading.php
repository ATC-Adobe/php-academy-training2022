<?php

spl_autoload_register(function ($class_name) {
    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__ . '/src';
    $className = str_replace('\\', $ds, $class_name);
    // get full name of file containing the required class
    $file = "{$dir}{$ds}{$className}.php";
    // get file if it is readable
    if (is_readable($file)) require_once $file;
});