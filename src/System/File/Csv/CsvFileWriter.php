<?php

namespace System\File\Csv;

use Model\Reservation\Model\ReservationModel;
use System\File\IFileWriter;

class CsvFileWriter implements IFileWriter {
    protected ?\SplFileObject $spl;

    public function __construct(
        string $filename
    ) {
        $this->spl = new \SplFileObject($filename, 'a');
    }



    public function writeLine(ReservationModel $reservation): bool {
        if (!$this->spl === null) {
            return false;
        }

        $id =       $reservation->getId();
        $surname =  $reservation->getUser()->getSurname();
        $email =    $reservation->getUser()->getEmail();
        $name =     $reservation->getUser()->getName();
        $roomId =   $reservation->getRoom()->getId();
        $from =     $reservation->getFrom()->format('d/m/y H:i:s');
        $to =       $reservation->getTo()->format(  'd/m/y H:i:s');

        $this->spl->fputcsv([
            $id,
            $roomId,
            $name,
            $surname,
            $email,
            $from,
            $to,
        ]);

        return true;
    }

    public function closeStream(): void {
        $this->spl = null;
    }
}