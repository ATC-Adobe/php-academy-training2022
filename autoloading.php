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
    }
}

$autoloader = new Autoloader();
$autoloader->loadConfig('autoloadingConfig.json');
