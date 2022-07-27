<?php

namespace Calculate;

class Calculate
{
    public function sum(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public function subtraction(int $number1, int $number2): int
    {
        return $number1 - $number2;
    }

    public function multiplication(int $number1, int $number2): int
    {
        return $number1 * $number2;
    }

    public function division(int $number1, int $number2): int
    {
        return $number1 / $number2;
    }
}