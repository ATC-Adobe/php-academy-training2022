<?php

namespace View\CompositeComponents\ConcreteNodes\Components;

use Model\Reservation\Model\ReservationModel;
use View\CompositeComponents\LeafNode;

class ReservationEntry extends LeafNode {

    public function draw(?ReservationModel $entry = null) {
        if($entry === null) {
            return;
        }

        $id =        $entry->getId();
        $name =     ($entry->getUser()->getName());
        $email =    ($entry->getUser()->getEmail());
        $surname =  ($entry->getUser()->getSurname());
        $room =     ($entry->getRoom()->getName());
        $to =       ($entry->getTo()->format("d/m/Y H:i:s"));
        $from =     ($entry->getFrom()->format("d/m/Y H:i:s"));


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
                    <div class='float'>
                        <form method='POST' action='/reservation/delete'>
                            <input type='hidden' name = 'id' value = '$id'>
                            <input type='submit' value='Delete reservation >'>                    
                        </form>
                    </div>
                    <div class='float'>
                        <form method='GET' action='/reservation/edit'>
                            <input type='hidden' name = 'id' value = '$id'>
                            <input type='submit' value='Edit reservation >'>                    
                        </form>
                    </div>
                    <div class ='clear'></div>
                </div >
                <div class='clear' ></div >
                </div>";
    }

    public function drawRaw(
        $id, $name, $email, $surname, $room, $to, $from,
        ) {
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
                </div >
                <div class='clear' ></div >
                </div>";
    }

}