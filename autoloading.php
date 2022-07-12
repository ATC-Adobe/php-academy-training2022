<?php declare(strict_types = 1);

// Composition root

class Autoloader {

    private array $funcAssoc = [];

    public function __construct() {
        spl_autoload_register([$this, 'resolveClass']);
    }

    public function registerClass(string $className, string $path) : void {
        $this->funcAssoc[$className] = $path;
    }

    public function loadConfig(string $filename) : void {
        $assoc = json_decode(
            file_get_contents($filename),
            true);

        foreach($assoc['root'] as $entry) {
            $this->registerClass($entry['name'], $entry['path']);
        }
    }

    public function resolveClass(string $className) : void {
        if(isset($this->funcAssoc[$className])) {
            require_once $this->funcAssoc[$className];
        }
        else {
            $ds = DIRECTORY_SEPARATOR;
            $dir = __DIR__ . '/src';
            $classNameR = str_replace('\\', $ds, $className);

            // get full name of file containing the required class
            $file = "{$dir}{$ds}{$classNameR}.php";

            // get file if it is readable
            if (is_readable($file)) require_once $file;
        }
    }
}

$autoloader = new Autoloader();
$autoloader->loadConfig(
    $_SERVER['DOCUMENT_ROOT'].'/autoloadingConfig.json'
);
