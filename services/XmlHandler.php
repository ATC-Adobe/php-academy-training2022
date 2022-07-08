<?php

include_once "./types.php";
class XmlHandler implements FileHandler
{
    public function __construct(protected string $filename, protected string $tag)
    {
    }
    public function readFile(): SimpleXMLElement|false {
        $xml = simplexml_load_file($this->filename);
        if(!$xml) {
            return false;
        }
        return $xml->children();
    }

    public function appendToFile(array $keyValuePairs, ?string $where = null) : bool {
        $xml = simplexml_load_file($this->filename);
        if($where) {
            $xml = $xml->{$where};
        }

        $node = $xml->addChild($this->tag);
        foreach ($keyValuePairs as $key => $value) {
            $node->addChild($key, $value);
        }

        return $xml->asXML($this->filename);
    }

}