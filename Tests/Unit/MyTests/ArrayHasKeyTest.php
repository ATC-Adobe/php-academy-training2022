<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArrayHasKeyTest extends TestCase
{
    public function testArray_Pass(): void
    {
        $car = ['Opel' => 'Astra'];

        $this->assertArrayHasKey('Opel', $car);
    }
}