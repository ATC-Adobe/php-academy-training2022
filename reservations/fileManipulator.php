<?php declare(strict_types = 1);

abstract class CsvManipulator {
    protected ?object $spl;

    public function __construct(
        string $filename, string $mode
    ) {
        $this->spl = new SplFileObject($filename, $mode);
    }

    public function isOpen() : bool {
        return $this->spl !== null;
    }

    public function closeStream() : void {
        $this->spl = null;
    }
}


// Class used for reading data from .csv file
class CsvReader extends CsvManipulator {

    public function __construct(string $filename) {
        parent::__construct($filename,'r');
    }

    public function parseFileToArray() : ?array {
        if(!$this->isOpen()) {
            return null;
        }

        $this->spl->setFlags(SplFileObject::READ_CSV);

        $res = [];
        foreach($this->spl as $row) {
            if($row[0] != null)
                $res[] = $row;
        }
        return $res;
    }
}

// simple line-appending utility
class CsvWriter extends CsvManipulator {

    public function __construct(string $filename) {
        parent::__construct($filename,'a');
    }

    public function putLinesToCSV(array $input) : void {
        if (!$this->isOpen()) {
            return;
        }

        foreach ($input as $fields) {
            $this->spl->fputcsv($fields);
        }
    }
}

class ReservationService__ {
    public function __construct() { }

    // checks if given time interval does not overlap with other reservations
    // if so return null
    // otherwise returns valid reservation id
    public function validateReservation(
        string $room_id, string $from, string $to
    ) : ?int {

        $file = new CsvReader('reservations.csv');
        $lines = $file->parseFileToArray();
        $file->closeStream();

        $nid = 0;

        $from = DateTime::createFromFormat('!d/m/y H:i:s', $from);
        $to   = DateTime::createFromFormat('!d/m/y H:i:s', $to);

        if($to <= $from)
            return null;

        foreach($lines as $line) {

            $nid = max($nid, intval($line[0]));

            if($line[1] == $room_id) {
                $r_from = DateTime::createFromFormat('! d/m/y H:i:s', $line[5]);
                $r_to   = DateTime::createFromFormat('! d/m/y H:i:s', $line[6]);

                // check if intervals ale overlapping
                if($from <= $r_to && $r_from <= $to) {
                    return null;
                }
            }
        }
        return $nid + 1;
    }

    // validates input and inserts them into "database" iff it's correct
    public function insertRequest(
        $room_id, $name, $surname, $email, $from, $to
    ) : bool {
        $room_nid = intval($room_id);

        // validation placeholder
        if($room_nid < 0 || $room_nid > 8)
            return false;

        if($surname == '' || $name == '' || $email == '')
            return false;


        $id = $this->validateReservation($room_id, $from, $to);

        if($id == null)
            return false;

        $spl = new CsvWriter('reservations.csv');
        $spl->putLinesToCSV([[
            $id, $room_id, $name, $surname, $email, $from, $to,
        ]]);
        $spl->closeStream();

        return true;
    }
}


