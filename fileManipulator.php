<?php declare(strict_types = 1);

// Class used for reading data from .csv file
class CSVreader {
    private ?object $spl;

    public function __construct(string $filename) {
        $this->spl = new SplFileObject($filename);
    }

    public function ParseFileToArray() : ?array {
        if($this->spl == null)
            return null;

        $this->spl->setFlags(SplFileObject::READ_CSV);

        $res = [];
        foreach($this->spl as $row) {
            if($row[0] != null)
                $res[] = $row;
        }
        return $res;
    }

    public function CloseStream() : void {
        $this->spl = null;
    }
}

// simple line-appending utility
class CSVwriter {
    private ?object $spl;

    public function __construct(string $filename) {
        $this->spl = new SplFileObject($filename, 'a');
    }

    public function PutLineToCSV(array $input) : void {
        if($this->spl == null)
            return;

        foreach ($input as $fields) {
            $this->spl->fputcsv($fields);
        }
    }

    public function CloseStream() : void {
        $this->spl = null;
    }
}

class ReservationService {
    public function __construct() { }

    // checks if given time interval does not overlap with other reservations
    // if so return null
    // otherwise returns valid reservation id
    public function ValidateReservation(
        string $room_id, string $from, string $to
    ) : ?int {

        $file = new CSVreader('reservations.csv');
        $lines = $file->ParseFileToArray();
        $file->CloseStream();

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
    public function InsertRequest(
        $room_id, $name, $surname, $email, $from, $to
    ) : bool {
        $room_nid = intval($room_id);

        // validation placeholder
        if($room_nid < 0 || $room_nid > 8)
            return false;

        if($surname == '' || $name == '' || $email == '')
            return false;

        $id = $this->ValidateReservation($room_id, $from, $to);

        $spl = new CSVwriter('reservation.csv');
        $spl->PutLineToCSV(array(array(
            $id, $room_id, $name, $surname, $email, $from, $to,
        )));
        $spl->CloseStream();

        return true;
    }
}


