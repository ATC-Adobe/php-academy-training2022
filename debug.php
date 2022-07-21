<?php
declare(strict_types=1);
//
//class Math
//{
//    public function  sumArray(array $integers): int
//    {
//        $sum = 0;
//        foreach ($integers as $integer) {
//            $sum += $integer;
//        }
//        return $sum;
//    }
//}
//
//$math = new Math();
//
//$intArray = [10, 2, 3, 4, 5];
//
//$intSum = $math->sumArray($intArray);
//
//
//echo $intSum;


//$a = 5;
//$b = 10;
//$c = $a + $b;
//
//echo 'Wynik obliczeń to: ' . $c . '<br>';

function add(int $a, int $b): int{
    return $a + $b;
};
$c = add(7,15);

$days = array("poniedziałek"=>"monday", "wtorek"=>"tuesday", "środa"=>"wednesday", "czwartek"=>"thursday", "piątek"=>"friday",
    "sobota"=>"saturday", "niedziela"=>"sunday");
foreach ($days as $day=>$value){
    echo "$day - $value<br>";
}