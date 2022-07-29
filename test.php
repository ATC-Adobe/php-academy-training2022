<?php


$count = 0;
$sum = 0;
$ssq = 0;

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= 6; $j++) {
            $arr = [$i, $j,];

            $s = 0;

            sort($arr);

            foreach ([1, 0] as $pos) {
                $s += $arr[$pos];
            }

            $sum += $s;
            $ssq += $s * $s;
            $count++;
    }
}

$exp = $sum / $count;
$var = $ssq / $count - $exp * $exp;

print_r (['tries' => $count, 'ssq' => $ssq, 'sum' => $sum, 'exp' => $exp, 'var' => $var]);



















