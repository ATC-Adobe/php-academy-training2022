<?php

    namespace Controller;

    use Reservation\Service\ReservationService;

    class DeleteReservationController {
        public function __construct () { }

        public function request () {
            if (isset($_POST['id'])) {
                $request = new ReservationService();
                $request->delete();

                header('Location: reservationList.php?deleted=true');
                die();
            }
            header('Location: reservationList.php?deleted=false');
            die();
        }
    }