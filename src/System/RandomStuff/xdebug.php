<?php
declare(strict_types = 1);

class math {

    public function sumArray(array $arr) : int {
        return array_reduce($arr, function (int $carry, int $item) {
           return $carry + $item;
        }, 0);
    }
}

$math = new math();

$res = $math->sumArray([1, 2, 3, 4, 5, 6, 7, 8, 9, 0,]);

echo $res;

echo '<br>';

$days = [
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
    "Sunday",
];

foreach ($days as $day) {
    echo $day.'<br>';
}



