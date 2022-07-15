<?php

namespace App\System\File;

use IOHandlerInterface;

class XmlHandler implements IOHandlerInterface
{
    protected string $tag = "reservation";
    public function __construct(protected string $filename,)
    {
    }
    public function readAll(): iterable|false {
        $xml = simplexml_load_file($this->filename);
        if(!$xml) {
            return false;
        }
        return $xml->children();
    }

    public function save(\ModelInterface $model, ?string $where = null) : bool {
        $keyValuePairs = $model->toArray();
        $xml = simplexml_load_file($this->filename);
        if($where) {
            $xml = $xml->{$where};
        }
        //generate id
        $temp = $this->readAll();
        if(is_countable($temp)) {
            $keyValuePairs["id"] = count($temp) + 1;
        }

        $node = $xml->addChild($this->tag);
        foreach ($keyValuePairs as $key => $value) {
            $node->addChild($key, $value);
        }

        return $xml->asXML($this->filename);
    }

}