<?php

class Math {
    public function sumArray(array $integers): int {
        $sum = 0;
        foreach ($integers as $integer) {
            $sum += $integer;
        }
        return $sum;
    }
}

$math = new Math();
$intArr = [1,2,3,4,5];

$intSum = $math->sumArray($intArr);

echo $intSum . "<br>";

$days = [
    "poniedziałek" => "monday",
    "wtorek" => "tuesday",
    "środa" => "wednesday",
    "czwartek" => "thursday",
    "piątek" => "friday",
    "sobota" => "saturday",
    "niedziela" => "sunday"
];

foreach ($days as $dzien => $day) {
    echo "$dzien: $day <br>";
}