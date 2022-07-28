<?php

namespace Test\Unit\Service;
require_once '../../../autoloading.php';

use Service\ApplicationService;

class ApplicationServiceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $startDate
     * @param $endDate
     * @return void
     * @dataProvider checkStarEndDatePassDataProvider
     */
    public function testCheckStartEndDateLogic_Pass($startDate, $endDate)
    {
        $date = new ApplicationService();
        $result = $date->checkStartEndDateLogic($startDate, $endDate);
        $expected = 'true';
        $this->assertSame($expected, $result);
    }

    public function checkStarEndDatePassDataProvider(): array
    {
        return[
            [
                ["2022-07-27 15:00:00", "2022-07-27 15:10:00"],
                ["2022-08-27 15:00:00", "2022-08-28 16:00:00"],
            ]
        ];
    }
}