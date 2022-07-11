

<?php
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
        if($this->root->n == 4) {
            $s = new node();
            $s->isLeaf = false;
            $s->pointers[0] = $this->root;
            $this->root = $s;

            $s->describe(0);

            $this->root->pointers[0]->splitChild(0, $this->root);
            echo "<br>kadjasjdj<br>";
            $s->describe(0);

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

        $this->keys =     [null, null, null, null];
        $this->values =   [null, null, null, null];
        $this->pointers = [null, null, null, null, null];
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
                $this->pointers[$i]->describe($intend + 4);
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

            if($this->pointers[$i]->n == 4) {
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
        $nn->n = 2;

        for($j = 0; $j < 2; $j++) {
            $nn->keys[$j]   = $this->keys[$j + 2];
            $nn->values[$j] = $this->values[$j + 2];
        }

        if(!$this->isLeaf) {
            for($j = 0; $j <= 2; $j++) {
                $nn->pointers[$j] = $this->pointers[$j + 2];
            }
        }

        $this->n = 1;

        for($j = $parent->n; $j >= $i; $j--) {
            $parent->pointers[$j + 1] = $parent->pointers[$j];
        }

        $parent->pointers[$i] = $nn;

        for($j = $parent->n - 1; $j >= $i; $j--) {
            $parent->keys[$j + 1]   = $parent->keys[$j];
            $parent->values[$j + 1] = $parent->values[$j];
        }

        $parent->keys[$i] = $this->keys[2];
        $parent->n++;

        // disk-writes
    }
}

$dict = new BTree();
//$dict->describe();
//echo '<br><br>';

$dict->insert(1, 4);
//$dict->describe();
//echo '<br><br>';

$dict->insert(7, 6);
//$dict->describe();
//echo '<br><br>';

$dict->insert(0, 6);
//$dict->describe();
//echo '<br><br>';

$dict->insert(5, 6);
//$dict->describe();
//echo '<br><br>';

$dict->insert(9, 6);
$dict->describe();
echo '<br><br>';



// longest common subsequence od 2 strings
function lcs(string $a, string $b) : string {
    $a = " " . $a;
    $b = " " . $b;


    $m = [[]];
    for($j = 0; $j < strlen($b); $j++)
        $m[0][] = 0;

    for($i = 1; $i < strlen($a); $i++) {
        $mp = [0];


        for($j = 1; $j < strlen($b); $j++) {
            if ($a[$i] == $b[$j]) {
                $mp[] = 1 + $m[$i - 1][$j - 1];
            } else {
                $mp[] = max($m[$i - 1][$j], $mp[$j - 1]);
            }
        }

        $m[] = $mp;
    }

    /*for($i = 1; $i < strlen($a); $i++) {
        for($j = 1; $j < strlen($b); $j++) {

            echo " ".$m[$i][$j]." ";
        }

        echo '<br>';
    }*/

    $i = strlen($a) - 1;
    $j = strlen($b) - 1;

    $res = "";

    while($i > 0 && $j > 0) {
        if($a[$i] == $b[$j]) {
            $res = $a[$i] . $res;
            $i--; $j--;
        }
        else {
            if($m[$i - 1][$j] > $m[$i][$j - 1]) {
                $i--;
            } else {
                $j--;
            }
        }

    }

    return $res;
}

//echo lcs("abaaaacgghj", "baaabckkkh");

// given array $arr find $i-th smallest element
function selection($arr, $i) : int {

    echo '<br>'.$i.'<br>';

    print_r($arr);
    echo '<br>';

    $delim = $arr[rand(0, count($arr)-1)];

    echo $delim.'<br>';

    $count = 0;
    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] <= $delim)
            $count++;
    }

    if($count == $i)
        return $delim;

    if($count < $i) {
        return selection(
                array_filter($arr,
                function ($arg) use ($delim) { return $delim < $arg; }),
        $i - $count);
    }
    else {
        return selection(
            array_filter($arr,
                function ($arg) use ($delim) { return $delim >= $arg; }),
            $i);
    }
}
/*
include_once "fileManipulator.php";

$obj = new ReservationService();

echo $obj->ValidateReservation('3', '02/06/23 8:30:00', '02/06/23 9:00:00');

*/
?>