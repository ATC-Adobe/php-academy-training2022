<?php

namespace System\RandomStuff;

class Calculate {

    public function calculate(int $a, int $b, string $op) : int {
        return match($op) {
            '*' => ($a * $b),
            '-' => ($a - $b),
            '+' => ($a + $b),
            default => 0,
        };

        /*
        if($op == '+') {
            return $a + $b;
        }

        if($op == '*') {
            return $a * $b;
        }

        if($op == '-') {
            return $a - $b;
        }

        return 0;
        */
    }

}