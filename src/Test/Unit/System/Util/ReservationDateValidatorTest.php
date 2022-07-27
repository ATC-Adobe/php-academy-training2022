<?php

namespace Test\Unit\System\Util;

use System\Status;
use System\Util\ReservationDateValidator;
use PHPUnit\Framework\TestCase;

class ReservationDateValidatorTest extends TestCase {

    public function testToday() {

        $this->assertGreaterThanOrEqual(
            new \DateTime(),
            new \DateTime('2050-01-01'),
            "Test is outdated, update needed"
        );
    }

    /**
     * @dataProvider validationData
     */
    public function testValidation(\DateTime $from, \DateTime $to, int $expected) {
        $valid = new ReservationDateValidator();

        $this->assertEquals($expected, $valid->validateDates($from, $to));
    }


    public function validationData() : array {
        return [
            [ new \DateTime('2050-07-01'), new \DateTime('2050-07-02'), Status::OK ],
            [ new \DateTime('2050-07-02'), new \DateTime('2050-07-01'), Status::RESERVATION_DATE_INCORRECT ],
            [ new \DateTime('2050-07-01'), new \DateTime('2050-08-01'), Status::OK ],
            [ new \DateTime('2050-07-01'), new \DateTime('2052-07-01'), Status::OK ],
            [ new \DateTime('1994-07-01'), new \DateTime('2050-07-01'), Status::RESERVATION_DATE_INCORRECT ],
        ];
    }
}
