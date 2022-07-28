<?php

namespace Test\Unit\TestedClasses;

class ContainsTest extends \PHPUnit\Framework\TestCase
{
    public function testContains_Pass()
    {
        $this->assertContains(5, [6, 7, 9], 'This haystack does not contain this needle');
    }
}