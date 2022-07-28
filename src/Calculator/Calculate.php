<?php

namespace Calculator;

class Calculate
{
    public function calculate(int $a, int $b, string $action) : int
    {
        switch ($action){
            case '+' :
                $result = $a + $b;
                break;
            case '-' :
                $result = $a - $b;
                break;
            case '*' :
                $result = $a * $b;
                break;
            default :
                $result = null;
        }
        return $result;
    }
}