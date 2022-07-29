<?php

    namespace Utils;
    use DateTime;
    use DateTimeZone;

    class DateManager {

        public static ?DateManager $instance = null;

        public static function getInstance () :DateManager {
            return self::$instance ??= new DateManager();
        }

        public function createDate (string $date, bool $datetimeInput) :DateTime {
            return match ($datetimeInput) {
                true    => DateTime::createFromFormat('Y-m-d\TH:i', $date),
                false   => DateTime::createFromFormat('Y-m-d H:i:s', $date),
                default => $date,
            };
        }

        public function getCurrentDate () :DateTime {
            return new DateTime("now", new DateTimeZone('Europe/Warsaw'));
        }

        public function isPastDate (DateTime $startDate, DateTime $endDate) :bool {
            if ($startDate < $this->getCurrentDate() || $endDate < $this->getCurrentDate()) {
                return false;
            }
            return true;
        }

        public function isDateCorrect (DateTime $startDate, DateTime $endDate) :bool {
            if ($startDate >= $endDate) {
                return false;
            }
            return true;
        }

    }