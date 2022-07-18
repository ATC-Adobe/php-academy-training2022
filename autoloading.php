<?php declare(strict_types = 1);

// Composition root

class Autoloader {

    private array $funcAssoc = [];

    /**
     *  Default constructor
     */
    public function __construct() {
        // Add 'resolveClass' method as autoloader callback
        spl_autoload_register([$this, 'resolveClass']);
    }


    /**
     * Adds non standard path
     *
     * @param string $className
     * @param string $path
     * @return void
     */
    public function registerClass(string $className, string $path) : void {
        $this->funcAssoc[$className] = $path;
    }


    /**
     * Loads configuration from JSon file
     *
     * @param string $filename
     * @return void
     */
    public function loadConfig(string $filename) : void {
        $assoc = json_decode(
            file_get_contents($filename),
            true);

        foreach($assoc['root'] as $entry) {
            $this->registerClass($entry['name'], $entry['path']);
        }
    }


    /**
     * Class autoloading
     *
     * @param string $className
     * @return void
     */
    public function resolveClass(string $className) : void {

        //if custom rule is specified
        if(isset($this->funcAssoc[$className])) {

            // add it
            require_once $this->funcAssoc[$className];
        }
        else {

            // default case
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

// global variable telling whether router is active or not
const __ROUTER = true;
