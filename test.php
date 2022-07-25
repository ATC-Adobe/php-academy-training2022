<?php
declare(strict_types = 1);

class Modeler {

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

class concr extends Modeler {

    static array $keys = ['a', 'b'];

    public int $a;
    public int $b;

    public function __construct() {}


}

$mo = new concr();
$mo->deserialize([ 'a' => 5, 'b' => 6]);


var_dump($mo);

var_dump($mo->serialize());

var_dump($res = concr::deserializeArray(
    [
        [ 'a' => 5, 'b' => 6],
        [ 'a' => 5, 'b' => 6],
        [ 'a' => 5, 'b' => 6],
    ]
));

var_dump(concr::serializeArray($res));




