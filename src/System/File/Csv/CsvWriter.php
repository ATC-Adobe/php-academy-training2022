<?php
    namespace System\File\Csv;

    use SplFileObject;
    use Reservation\Model\ReservationModel;

    class CsvWriter {
        protected object $file;

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename, 'a');
        }

        public function saveData (): bool {
            if ($this->file == null) {
                return false;
            }

            $read = (new CsvReader('./src/System/Data/reservations.csv'))->loadData();
            $reservationId = strval(sizeof($read) + 1);
            $roomId     = $_POST['roomId'];
            $firstName  = $_POST['firstName'];
            $lastName   = $_POST['lastName'];
            $email      = $_POST['email'];
            $startDate  = date('d/m/y\ H:i:s', strtotime($_POST['startDate']));
            $endDate    = date('d/m/y\ H:i:s', strtotime($_POST['endDate']));


            $data[] = [$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate];

            foreach ($data as $rows) {
                $this->file->fputcsv($rows);
            }
            return true;
        }

        //TODO: change data by example id
        public function changeData (string $reservationId, ReservationModel $reservation) :void {
        }

        public function closeFile(): void {
            unset($this->file);
        }
    }