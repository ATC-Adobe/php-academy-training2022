<?php

    namespace Controller;

    use Reservation\Service\ReservationService;
    use System\File\FileWriter;

    class AddReservationController {

        public function request() :void {
            if (isset($_POST['roomId']) &&
                isset($_POST['firstName']) &&
                isset($_POST['lastName']) &&
                isset($_POST['email']) &&
                isset($_POST['startDate']) &&
                isset($_POST['endDate']) &&
                isset($_POST['action'])
                )
            {
                $instace = new FileWriter();
                $instace->save($_POST['action']);
                header("Location: ./reservationList.php?confirmed=true");
                die();
            }

            header("Location: ./reservationList.php?confirmed=false");
            die();
        }
    }