<?php

include_once 'autoloading.php';

class FileWriterFactory {
    private array $workers;

    public function __construct() {
        $this->workers = [];
    }

    public function registerWorker(string $key, FactoryWorker $worker) : void {

        $this->workers[$key] = $worker;
    }

    public function getInstance($key) : ?FileWriter {
        if(!isset($this->workers[$key])) {
            return null;
        }

        if(! $this->workers[$key] instanceof FactoryWorker) {
            return null;
        }

        return $this->workers[$key]->getInstance();
    }
}

interface FactoryWorker {
    public function getInstance(): FileWriter;
}

interface FileWriter {
    public function __construct();
    public function writeLine() : void;
    public function isOpen() : bool;
    public function closeStream() : void;
}

class XmlSaver implements FileWriter {
    public function __construct() {}
    public function writeLine() : void {}
    public function isOpen() : bool { return false; }
    public function closeStream() : void {}
}

class XmlSaverWorker implements FactoryWorker {
    public function getInstance(): FileWriter {
        return new XmlSaver();
    }
}


class JsonSaver implements FileWriter {
    public function __construct() {}
    public function writeLine() : void {}
    public function isOpen() : bool { return false; }
    public function closeStream() : void {}
}

class JsonSaverWorker implements FactoryWorker {
    public function getInstance(): FileWriter {
        return new JsonSaver();
    }
}


class CsvSaver implements FileWriter {
    public function __construct() {}
    public function writeLine() : void {}
    public function isOpen() : bool { return false; }
    public function closeStream() : void {}
}

class CsvSaverWorker implements FactoryWorker {
    public function getInstance(): FileWriter {
        return new CsvSaver();
    }
}

$factory = new FileWriterFactory();
$factory->registerWorker("xml", new XmlSaverWorker());
$factory->registerWorker("csv", new CsvSaverWorker());
$factory->registerWorker("json", new JsonSaverWorker());

var_dump($factory->getInstance("xml"));
var_dump($factory->getInstance("csv"));
var_dump($factory->getInstance("json"));
var_dump($factory->getInstance("No cost too great"));


$repo = new \Reservation\Repository\ReservationConcreteRepository();

$repo->getAllReservations();


