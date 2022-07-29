<?php

    namespace Test\Unit\Reservation;

    use DateTime;
    use PHPUnit\Framework\TestCase;
    use Utils\DateManager;

    class ReservationDateTest extends TestCase {

        /**
         * @dataProvider dateDataProvider
         * @param DateTime $startDate
         * @param DateTime $endDate
         * @return void
         */

        public function testDateIsCorrect (DateTime $startDate, DateTime $endDate) :void {
            $dateManager = DateManager::getInstance();
            $result = $dateManager->isDateCorrect($startDate, $endDate);
            $this->assertTrue($result);
        }

//        public function testDateIsPast (DateTime $startDate, DateTime $endDate) :void {
//            $dateManager = DateManager::getInstance();
//            $result = $dateManager->isPastDate($startDate, $endDate);
//            $this->assertTrue($result);
//        }

        public function dateDataProvider () :array {
            return [
                [new DateTime("2022-07-28 16:00:00"), new DateTime("2022-07-28 17:00:00")],
                [new DateTime("2022-07-25 15:00:00"), new DateTime("2022-07-25 16:00:00")]
            ];
        }
    }