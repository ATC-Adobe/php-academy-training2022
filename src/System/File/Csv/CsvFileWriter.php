<?php

namespace System\File\Csv;

use Reservation\Model\ReservationModel;
use System\File\IFileWriter;

class CsvFileWriter implements IFileWriter {
    protected ?\SplFileObject $spl;

    public function __construct(
        string $filename
    ) {
        $this->spl = new \SplFileObject($filename, 'a');
    }



    public function writeLine(ReservationModel $reservation): bool {
        echo "putting";
        if (!$this->spl === null) {
            return false;
        }

        $id =       $reservation->getId();
        $surname =  $reservation->getSurname();
        $email =    $reservation->getEmail();
        $name =     $reservation->getName();
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