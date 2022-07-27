<?php

namespace System\Util;

use System\Status;

class ReservationDateValidator {

    public function validateDates(\DateTime $from, \DateTime $to) : int {


        if($to <= $from || $from < new \DateTime()) {
            return Status::RESERVATION_DATE_INCORRECT;
        }

        return Status::OK;

    }
}