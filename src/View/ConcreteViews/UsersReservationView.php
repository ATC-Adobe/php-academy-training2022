<?php

declare(strict_types = 1);

use Model\Reservation\Model\ReservationModel;
use Model\Reservation\Repository\ReservationConcreteRepository;

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/layout/css/style.css">

    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body>

<?php
    include "layout/menur.php";
?>

<div class="header">
    Your Reservations
    <br><br>
    <div class="main">

        <a href="/user/info"> User Profile > </a><br><br>

        <?php

        $reservationRepository = new ReservationConcreteRepository();

        $sess =  \System\Util\Session::getInstance();

        echo "ID: ".$sess->get('id')."<br>";


        $entries = $reservationRepository
            ->getReservationsByUserId(
                intval($sess->get('id'))
            );

        foreach($entries as $entry) {

            if (!$entry instanceof ReservationModel) {
                echo "This should not happen";
                die();
            }

            $id =       $entry->getId();

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
                    $from - $to <br>";

            echo    "<form method='POST' action='/delete/reservation'>
                        <input type='hidden' name = 'id' value = '$id'>
                        <input type='submit' value='Delete reservation >'>                    
                    </form>
                </div >
                <div class='clear' ></div >
                </div>";
        }

        ?>
    </div>
</div>

<?php include 'layout/footer.html' ?>
</body>
</html>

