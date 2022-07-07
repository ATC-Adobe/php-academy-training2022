<?php

include_once "./services/CsvHandler.php";
include_once "./services/JsonHandler.php";
include_once "./services/XmlHandler.php";
class BasicService
{
    protected string $extension;
    protected $reader;
    public function __construct(protected string $filename, array $columns, string $tag)
    {
        $exp = explode(".", $this->filename);
        $this->extension = end($exp);
        if($this->extension === "csv") {
            $this->reader = new CsvHandler($this->filename, $columns);
        }
        if($this->extension === "xml") {
            $this->reader = new XmlHandler($this->filename, $tag);
        }
        if($this->extension === "json") {
            $this->reader = new JsonHandler($this->filename);
        }
    }
}