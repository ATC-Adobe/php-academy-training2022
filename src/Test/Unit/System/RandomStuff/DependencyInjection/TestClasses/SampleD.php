<?php

namespace Test\Unit\System\RandomStuff\DependencyInjection\TestClasses;

class SampleD {
    public function __construct(SampleD $rec) {
    }
}