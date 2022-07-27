<?php

namespace Repository;

class Calculate
{
    public function calculateAdd(int $num1, int $num2): int
    {
        return $num1 + $num2;
    }

    public function calculateSubstr($num1, $num2): int
    {
        return $num1 - $num2;
    }

    public function calculateMulti($num1, $num2): int
    {
        return $num1 * $num2;
    }
}