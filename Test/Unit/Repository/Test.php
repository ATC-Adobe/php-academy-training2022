<?php

namespace Test\Unit\Repository;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testTrue_Pass()
    {
        $value = true;
        $this->assertTrue($value);
    }
}