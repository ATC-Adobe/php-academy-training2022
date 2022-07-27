<?php

use PHPUnit\Framework\TestCase;
use Validations\DateAndTimeValidation;

class DateAndTimeValidationTest extends TestCase
{
    /**
     * @dataProvider DateTimeFailureDataProvider
     * @return void
     */
    public function testCheckDatesAndHours_Failure($startDay, $endDay, $startHour, $endHour)
    {
        $validation = new DateAndTimeValidation();
        $checkDates = $validation->checkDatesAndHours($startDay, $endDay, $startHour, $endHour);

        $expectedReturn = 'true';

        $this->assertSame($expectedReturn, $checkDates);
    }

    public function DateTimeFailureDataProvider()
    {
        return
            [
                ["2022-07-28", "2022-07-28", "14:00", "15:00"],
                ["2022-07-26", "2022-07-26", "08:00", "09:00"],
                ["2022-07-29", "2022-07-28", "08:00", "09:00"],
                ["2022-07-29", "2022-07-29", "15:00", "15:00"],
                ["2022-07-29", "2022-07-29", "10:00", "09:00"]
            ];
    }
}