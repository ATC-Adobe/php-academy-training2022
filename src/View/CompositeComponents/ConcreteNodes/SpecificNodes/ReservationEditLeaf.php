<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use Model\Reservation\Repository\ReservationConcreteRepository;
use System\Util\Authenticator;
use View\CompositeComponents\LeafNode;

class ReservationEditLeaf extends LeafNode {

    public function draw() {

        $reservation = (new ReservationConcreteRepository())
            ->getReservationById(intval($_GET['id']));

        $user = (new Authenticator())
            ->getUser();

        $roomId = $reservation->getRoom()->getId();

        if($reservation->getUser()->getId() != $user->getId()) {
            echo 'You can\'t edit reservation that is not yours';
            return;
        }
        ?>

            <form method = 'POST'></form>
                <div class="ltable float">
                    Room ID:<br>
                    <br>
                    From: <br>
                    To: <br>
                </div>
                <div class="rtable float">
                    <?php echo $roomId; ?>
                    <input type="hidden" name="room_id" value="<?php echo $roomId; ?>"><br>
                    <br>
                    <input type="datetime-local" value="<?php
                        echo $reservation->getFrom()->format('Y-m-d\TH:i');
                    ?>"><br>
                    <input type="datetime-local" value="<?php
                        echo $reservation->getTo()->format('Y-m-d\TH:i');
                    ?>"><br>
                </div>
                <div class="clear"></div>
        <?php
    }
}