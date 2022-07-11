<?php

include_once "./services/CsvHandler.php";
include_once "./services/JsonHandler.php";
include_once "./services/XmlHandler.php";
include_once "./Connection.php";
class BasicService
{
    protected string $extension;
    protected FileHandlerInterface $fileHandler;
    public function __construct(protected string $filename, array $columns, string $tag)
    {

        $exp = explode(".", $this->filename);
        $this->extension = end($exp);
        if($this->extension === "csv") {
            $this->fileHandler = new CsvHandler($this->filename, $columns);
        }
        if($this->extension === "xml") {
            $this->fileHandler = new XmlHandler($this->filename, $tag);
        }
        if($this->extension === "json") {
            $this->fileHandler = new JsonHandler($this->filename);
        }
    }
    protected function generateId(): int {
        if($this->extension === "csv") {
            return $this->fileHandler->getRowNumCsv();
        }
        else {
            $data = $this->fileHandler->readFile();
            return count($data) + 1;
        }
    }
}