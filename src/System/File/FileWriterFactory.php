<?php

namespace System\File;

use System\File\Csv\CsvFileWriterBuilder;
use System\File\DBAdapter\DBWriterBuilder;
use System\File\Json\JsonFileWriterBuilder;
use System\File\Xml\XmlFileWriterBuilder;

class FileWriterFactory {
    private array $workers;

    /**
     *
     */
    public function __construct() {
        $this->workers = [];

        $this->registerWorker("db",   new DBWriterBuilder());
        $this->registerWorker("xml",  new XmlFileWriterBuilder("reservations/reservations.xml"));
        $this->registerWorker("json", new JsonFileWriterBuilder("reservations/reservations.json"));
        $this->registerWorker("csv",  new CsvFileWriterBuilder("reservations/reservations.csv"));
    }

    /**
     * Adds new resolve rule to the collection
     *
     * @param string $key Name
     * @param IFileWriterBuilder $worker Factory Worker
     * @return void
     */
    public function registerWorker(string $key, IFileWriterBuilder $worker) : void {

        $this->workers[$key] = $worker;
    }

    /**
     * Gets IFileWriter by given key value
     *
     * @param $key
     * @return IFileWriter|null
     */
    public function getInstance($key) : ?IFileWriter {
        if(!isset($this->workers[$key])) {
            return null;
        }

        if(! $this->workers[$key] instanceof IFileWriterBuilder) {
            return null;
        }

        return $this->workers[$key]->buildInstance();
    }
}