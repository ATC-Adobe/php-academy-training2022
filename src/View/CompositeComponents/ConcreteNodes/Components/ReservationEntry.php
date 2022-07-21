<?php

namespace View\CompositeComponents\ConcreteNodes\Components;

use Model\Reservation\Model\ReservationModel;
use View\CompositeComponents\LeafNode;

class ReservationEntry extends LeafNode {

    public function draw(?ReservationModel $entry = null) {
        if($entry === null) {
            return;
        }

        $id =                        $entry->getId();
        $name =     htmlspecialchars($entry->getUser()->getName());
        $email =    htmlspecialchars($entry->getUser()->getEmail());
        $surname =  htmlspecialchars($entry->getUser()->getSurname());
        $room =     htmlspecialchars($entry->getRoom()->getName());
        $to =       htmlspecialchars($entry->getTo()->format("d/m/Y H:i:s"));
        $from =     htmlspecialchars($entry->getFrom()->format("d/m/Y H:i:s"));

        echo "<div class='row'>
                <div class='float ltable' style = 'line-height: 1.2em;' >
                    Room name: <br >
                    Name: <br >
                    E - mail: <br >
                    Time span: <br >
                </div >
                <div class='float rtable' style = 'line-height: 1.2em;' >
                    $room <br>
                    $name $surname <br>
                    $email <br>
                    $from - $to <br>
                    <form method='POST' action='/reservation/delete'>
                        <input type='hidden' name = 'id' value = '$id'>
                        <input type='submit' value='Delete reservation >'>                    
                    </form>
                </div >
                <div class='clear' ></div >
                </div>";
    }

}