<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CountTest extends TestCase
{
    public function testCount_Pass(): void
    {
        $car = ['Opel', 'Honda', 'Nissan', 'Peugeot'];
        $expectedCount = 4;
        $this->assertCount($expectedCount, $car);
    }
}