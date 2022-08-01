<?php

namespace Test\Unit\System\RandomStuff\DependencyInjection\TestClasses;

class SampleB {

    static ?SampleB $inst = null;
    private function __construct() { }

    public static function getInst() : SampleB {
        return self::$inst ??= new SampleB();
    }
}