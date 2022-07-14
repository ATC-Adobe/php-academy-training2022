<?php declare(strict_types = 1);

require_once 'autoloading.php';

$tree = new \System\Util\BTree();

$vals = [2, 3, 1, 7, 4, 2, 9, 23, 0];

foreach ($vals as $val) {
    $tree->insert($val, 0);
    $tree->describe();

    echo '<br><br>';
}

