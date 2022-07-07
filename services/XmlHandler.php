<?php

include_once "./types.php";
class XmlHandler implements FileHandler
{
    public function __construct(protected string $filename)
    {
    }
    public function readFile(): SimpleXMLElement|false {
        $xml = simplexml_load_file($this->filename);
        if(!$xml) {
            return false;
        }
        return $xml->children();
    }

    public function AppendToFile(array $keyValuePairs, string $tag = "tag",  ?string $where = null) : bool {
        $xml = simplexml_load_file($this->filename);
        if($where) {
            $xml = $xml->{$where};
        }

        $node = $xml->addChild($tag);
        foreach ($keyValuePairs as $key => $value) {
            $node->addChild($key, $value);
        }

        return $xml->asXML($this->filename);
    }

}