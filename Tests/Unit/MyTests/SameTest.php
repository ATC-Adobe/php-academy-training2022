<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SameTest extends TestCase
{
    public function testSame_Failure()
    {
        $expectedYear = 2023;
        $actualYear = 2022;

        $this->assertSame($expectedYear, $actualYear);
    }
}