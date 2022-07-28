<?php

namespace Test\Unit\TestedClasses;

use TestedClasses\StringContainsStringIgnoringCase;

class StringContainsStringIgnoringCaseTest extends \PHPUnit\Framework\TestCase
{
    public function testStringContainsStringIgnoringCase_Pass()
    {
        $this->assertStringContainsStringIgnoringCase('commiT', 'commitment', 'This string haystack does not contain this string needle');
    }
}