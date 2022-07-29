<?php

    namespace Utils;

    class Calculate {

        public function calculate (int $a, int $b, string $action) :int {
            switch ($action) {
                case "+":
                    return $a + $b;
                case "-":
                    return $a - $b;
                case "*":
                    return $a * $b;
                default:
                    return -1;
            }
        }

    }