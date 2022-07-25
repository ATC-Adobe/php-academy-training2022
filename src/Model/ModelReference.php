<?php

namespace Model;

// model base
// provides inheritable serialization interface

// every child class needs to specify static array $keys which holds
// list of valid internal properties to enable serialization

abstract class ModelReference {

    protected static array $keys = [];


    public function deserialize(array $arg) : void {

        foreach ($arg as $key => $value) {

            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

    }

    public function serialize() : array {
        $res = [];

        foreach(static::$keys as $key) {
            $res[$key] = $this->$key;
        }

        return $res;
    }

    public static function deserializeArray(array $arr) : array {

        for($i = 0; $i < count($arr); $i++ ) {

            $args = $arr[$i];
            $model = new static();
            $model->deserialize($args);

            $arr[$i] = $model;
        }

        return $arr;
    }

    public static function serializeArray(array $arr) : array {

        for($i = 0; $i < count($arr); $i++) {
            $arr[$i] = $arr[$i]->serialize();
        }

        return $arr;
    }

}