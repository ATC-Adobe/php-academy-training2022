<?php declare(strict_types = 1);

namespace System\Util;


// B - tree (2-3-4 B-tree)
class BTree {
    private node $root;
    private int  $count;
    private int  $t = 2;

    public function __construct() {
        $this->root = new node();
    }

    public function find(mixed $key) : mixed {
        return $this->root->find($key);
    }

    public function insert(mixed $key, mixed $value) : void {
        if($this->root->n == 3) {
            $s = new node();
            $s->isLeaf = false;
            $s->pointers[0] = $this->root;
            $this->root = $s;

            //$s->describe(0);

            $this->root->pointers[0]->splitChild(0, $this->root);

            $t = $this->root->pointers[0];
            $this->root->pointers[0] =
                $this->root->pointers[1];
            $this->root->pointers[1] = $t;

            //$s->describe(0);

        }

        $this->root->insertNonFull($key, $value);
    }

    public function describe() : void {
        $this->root->describe(0);
    }
}

class node {
    public bool $isLeaf;
    public int  $n;
    public array $keys;
    public array $values;
    public array $pointers;

    public function __construct() {
        $this->isLeaf = true;
        $this->n = 0;

        $this->keys =     [null, null, null,];
        $this->values =   [null, null, null,];
        $this->pointers = [null, null, null, null,];
    }

    public function find(mixed $key) : mixed {
        $i = 0;
        for(; $i < $this->n && $key > $this->keys[$i]; $i++) { $j = empty($i); }

        if($i < $this->n && $this->keys[$i] == $key) {
            return $this->values[$i];
        }
        if( $this->isLeaf ) {
            return null;
        }

        // invariance: if node is not leaf, pointers are not null
        return $this->pointers[$i]->find($key);
    }

    public function describe(int $intend) : void {
        $x = str_repeat('-', $intend);

        for($i = 0; $i < $this->n; $i++) {
            echo $x . '('.$this->keys[$i].' => '.$this->values[$i].')<br>';
        }

        echo $x.'==<br>';

        if(!$this->isLeaf) {
            for ($i = 0; $i <= $this->n; $i++) {
                $this->pointers[$i]?->describe($intend + 4);
                echo $x.'==<br>';
            }
        }
    }

    public function insertNonFull(mixed $key, mixed $value) : void {
        echo "Insert $key $value <br>";

        $i = $this->n - 1;

        if($this->isLeaf) {
            while ($i >= 0 && $key < $this->keys[$i]) {
                $this->keys[$i + 1] = $this->keys[$i];
                $this->values[$i + 1] = $this->values[$i];
                $i--;
            }

            $this->keys[$i + 1]   = $key;
            $this->values[$i + 1] = $value;
            $this->n++;
        }
        else {
            while ($i >= 0 && $key < $this->keys[$i]) {
                $i--;
            }
            echo "$i <br>";

            $i++;

            // disk read

            if($this->pointers[$i]->n == 3) {
                $this->pointers[$i]->splitChild($i, $this);
                if($key > $this->keys[$i]) {
                    $i++;
                }
            }

            $this->pointers[$i]->insertNonFull($key, $value);
        }
    }

    public function splitChild(int $i, node $parent) : void {
        $nn = new node();
        $nn->isLeaf = $this->isLeaf;
        $nn->n = 1;

        $nn->keys[0]   = $this->keys[2];
        $nn->values[0] = $this->values[2];


        if(!$this->isLeaf) {
            $nn->pointers[0] = $this->pointers[2];
            $nn->pointers[1] = $this->pointers[3];
        }

        $this->n = 1;

        for($j = $parent->n; $j >= $i; $j--) {
            $parent->pointers[$j + 1] = $parent->pointers[$j];
        }
        $parent->n++;

        $parent->pointers[$i] = $nn;

        for($j = $parent->n - 1; $j >= $i; $j--) {
            $parent->keys[$j + 1]   = $parent->keys[$j];
            $parent->values[$j + 1] = $parent->values[$j];
        }

        $parent->keys[$i] = $this->keys[1];


        // disk-writes
    }
}
