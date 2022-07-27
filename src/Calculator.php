<?php

namespace App;

class Calculator
{
    public function calculate(int $a, int $b, string $sign): int {
        switch($sign) {
            case '+':
                return $a + $b;
            case '-':
                return $a - $b;
            case '*':
                return $a * $b;
        }
        return -1;
    }
}