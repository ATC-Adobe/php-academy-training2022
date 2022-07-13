<?php
    namespace System\File\Csv;

    use SplFileObject;
    use Reservation\Model\ReservationModel;
    use System\File\FileWriterInterface;

    class CsvWriter implements FileWriterInterface {
        protected object $file;

        public function __construct(string $filename) {
            $this->file = new SplFileObject($filename, 'a');
        }

        public function saveData (ReservationModel $reservation): bool {
            if ($this->file == null) {
                return false;
            }

            $reservationId  = $reservation->getReservationId();
            $roomId         = $reservation->getRoom()->getId();
            $firstName      = $reservation->getFirstName();
            $lastName       = $reservation->getLastName();
            $email          = $reservation->getEmail();
            $startDate      = $reservation->getStartDate();
            $endDate        = $reservation->getEndDate();

            $data = [$reservationId, $roomId, $firstName, $lastName, $email, $startDate, $endDate];

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