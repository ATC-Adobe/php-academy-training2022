<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use Model\Reservation\Model\ReservationModel;
use Model\Room\Repository\RoomConcreteRepository;
use Model\User\Model\UserModel;
use View\CompositeComponents\ConcreteNodes\Components\ReservationEntry;
use View\CompositeComponents\LeafNode;

class FileReservationList extends LeafNode {

    public function draw() {

        $repo = new RoomConcreteRepository();

        $entryComponent = new ReservationEntry();

        ?>

        <br>
        JSON:

        <?php
            $resv = json_decode(
                    file_get_contents('reservations/reservations.json'),
                    true);

            foreach ($resv['root'] as $entry) {
                $entryComponent->drawRaw(
                        $entry['id'],
                        $entry['name'],
                        $entry['email'],
                        $entry['surname'],
                        $entry['room_id'],
                        $entry['from'],
                        $entry['to'],
                );
            }

        ?>

        <br>

        XML:

        <?php
            $xml = simplexml_load_file('reservations/reservations.xml');

            foreach($xml->reservations->reservation as $entry) {
                $entryComponent->drawRaw(
                        $entry->id,
                        $entry->name,
                        $entry->email,
                        $entry->surname,
                        $entry->room_id,
                        $entry->from,
                        $entry->to,
                );
            }
        ?>

        <br>

        Csv:

        <?php

            $spl = new \SplFileObject('reservations/reservations.csv');
            $spl->setFlags(\SplFileObject::READ_CSV);

            foreach($spl as $row) {
                if($row[0] != null)

                    $entryComponent->drawRaw(
                        $row[0],
                        $row[2],
                        $row[4],
                        $row[3],
                        $row[1],
                        $row[5],
                        $row[6],
                    );
            }



        ?>

        <?php
    }

}