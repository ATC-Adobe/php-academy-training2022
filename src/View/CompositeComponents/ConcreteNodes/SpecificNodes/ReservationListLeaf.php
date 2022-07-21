<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use Model\Reservation\Repository\ReservationConcreteRepository;
use View\CompositeComponents\ConcreteNodes\Components\ReservationEntry;
use View\CompositeComponents\LeafNode;

class ReservationListLeaf extends LeafNode {

    private int $uid;

    public function __construct(int $uid = 0) {
        parent::__construct();

        $this->uid = $uid;
    }

    public function draw() {

        $uid = $this->uid;
        $entries = [];
        $reservationRepository = new ReservationConcreteRepository();

        if($uid === 0) {
            $entries = $reservationRepository->getAllReservations();
        }
        else {
            $entries = $reservationRepository->getReservationsByUserId($uid);
        }

        $entryView = new ReservationEntry();

        foreach($entries as $entry)  {
            $entryView->draw($entry);
        }

    }
}