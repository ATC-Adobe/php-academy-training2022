<?php

declare(strict_types=1);

class math
{
    public function sumArray(array $inteers): int
    {
        $sum = 0;
        foreach ($inteers as $inteer) {
            $sum += $inteer;
        }
        return $sum;
    }
}

$math = new math();

$intArray = [1, 2, 3, 4, 5];

$intSum = $math->sumArray($intArray);

echo $intSum;

