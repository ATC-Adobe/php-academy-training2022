<?php

namespace Test\Unit\Repository;

use phpDocumentor\Reflection\Types\This;
use Repository\StrategySaveToDbClass;
use Cz\PHPUnit\MockDB\Mock;

class StrategySaveToDbClassRoomsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideRoomsData
     */
    public function testRooms($startDateNew, $startDate, $endDate, $expected)
    {
        $mock = $this->createMock(StrategySaveToDbClass::class);
        $mock->expects($this->once())
            ->method('checkRoom')
            ->willReturn(true);
        $datesObject = new StrategySaveToDbClass();
        $actual = $datesObject->checkRoom($startDateNew);
        $this->assertSame($expected, $actual);
    }

    public function provideRoomsData() : array
    {
        return [
            ['2022-07-28 03:57:00', '2022-07-28 04:57:00', '2022-07-28 05:57:00', true],
            ['2022-07-28 03:57:00', '2022-07-28 02:57:00', '2022-07-28 05:57:00', false]
        ];
    }
}