<?php

namespace Test\Unit\System\RandomStuff\DependencyInjection\TestClasses;

class SampleC {
    public SampleA $a;
    public ?SampleB $b;

    public function __construct(SampleA $a, ?SampleB $b) {
        $this->a = $a;
        $this->b = $b;
    }

}