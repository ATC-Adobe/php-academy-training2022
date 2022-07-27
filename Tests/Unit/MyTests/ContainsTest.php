<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ContainsTest extends TestCase
{
    public function testContains_Pass(): void
    {
        $car = ['Opel' => 'Astra', 'Honda' => 'Civic'];
        $value = 'Astra';

        $this->assertContains($value, $car);
    }
}