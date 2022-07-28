<?php

namespace Test\Unit\Repository;

use Repository\StrategySaveToDbClass;

class StrategySaveToDbClassTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideDatesData
     */
    public function testDates($startDate, $endDate, $expected)
    {
        $datesObject = new StrategySaveToDbClass();
        $actual = $datesObject->checkEndDate($startDate, $endDate);
        $this->assertSame($expected, $actual);
    }

    public function provideDatesData() : array
    {
        return [
            ['2022-07-28 03:57:00', '2022-07-28 04:57:00', true],
            ['2022-07-28 03:57:00', '2022-07-28 02:57:00', false]
        ];
    }

}