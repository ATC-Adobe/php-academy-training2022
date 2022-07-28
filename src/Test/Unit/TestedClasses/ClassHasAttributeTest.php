<?php

namespace Test\Unit\TestedClasses;

use TestedClasses\ClassHasAttribute;
use function Webmozart\Assert\Tests\StaticAnalysis\string;


class ClassHasAttributeTest extends \PHPUnit\Framework\TestCase
{
    public function testClassHasAttribute_Pass(){

        $this->assertClassHasAttribute('attribute1', ClassHasAttribute::class, 'This attribute was not found');
    }
}