<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ClassHasAttributeTest extends TestCase
{
    protected string $string;

    public function testAttribute_Pass(): void
    {
        $this->assertClassHasAttribute('string', "ClassHasAttributeTest");
    }
}