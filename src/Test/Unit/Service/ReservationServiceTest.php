<?php

namespace App\Test\Unit\Service;
require_once 'types.php';

use App\Service\ReservationService;
use PHPUnit\Framework\TestCase;

class ReservationServiceTest extends TestCase
{

    /**
     * @dataProvider checkEndIsAfterStartPassDataProvider
     */
    public function testCheckEndIsAfterStartPass(string $start, string $end) {
        $service = new ReservationService();
        $res = $service->checkEndIsAfterStart($start, $end);
        $this->assertTrue($res);
    }

    public function checkEndIsAfterStartPassDataProvider()
    {
        return [
            ["2022-07-27 10:10:10", "2022-07-28 10:10:10"],
            ["2022-06-27 10:10:10", "2022-07-28 10:10:10"],
            ["2022-06-27 10:10:10", "2023-06-28 10:10:10"],
            ["2022-06-27 10:10:10", "2023-06-27 11:10:10"],
        ];
    }
}