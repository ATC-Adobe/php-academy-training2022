<?php

namespace Test\Unit\TestedClasses;

use TestedClasses\StringContainsString;

class StringContainsStringTest extends \PHPUnit\Framework\TestCase
{
    public function testStringContainsString_Pass()
    {
        $this->assertStringContainsString('commiT', 'commitment', 'This string haystack does not contain this string needle');
    }
}