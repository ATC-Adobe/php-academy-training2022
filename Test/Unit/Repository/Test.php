<?php

namespace Test\Unit\Repository;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testTrue_Pass(): void
    {
        $value = true;
        $this->assertTrue($value);
    }

    public function testTrue_Fail(): void
    {
        $value = false;
        $this->assertTrue($value);
    }

    public function testArrayEmpty_Pass(): void
    {
        $array = [];
        $this->assertEmpty($array);
    }

    public function testArrayEmpty_Fail(): void
    {
        $array = [1, 'Jan', 'Kowalski'];
        $this->assertEmpty($array);
    }

    public function testIsSTString_Pass(): void
    {
        $string = 'string';
        $this->assertIsString($string);
    }

    public function testIsString_Fail(): void
    {
        $string = 123;
        $this->assertIsString($string);
    }

    /**
     * @param $object1
     * @param $object2
     * @return void
     * @dataProvider samePassDataProvider
     */
    public function testSame_Pass($object1, $object2): void
    {
        $this->assertSame($object1, $object2);
    }

    public function samePassDataProvider()
    {
        return [
            ['jan', 'jan'],
            [1, 1],
        ];
    }

    /**
     * @param $object1
     * @param $object2
     * @return void
     * @dataProvider sameFailDataProvider
     */
    public function testSame_Fail($object1, $object2)
    {
        $this->assertSame($object1, $object2);
    }

    public function sameFailDataProvider()
    {
        return [
            ['jan', 'kowalski'],
            [1, 2],
        ];
    }
}