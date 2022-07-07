<?php
    declare(strict_types = 1);
    require_once "./class/ReservationService.php";
    use PHPCourse\ReservationService;

    if (isset($_POST['roomId'])) {
        [ $roomId, $firstName, $lastName, $email, $startDate, $endDate ] =
            [   $_POST['roomId'], $_POST['firstName'], $_POST['lastName'],
                $_POST['email'], $_POST['startDate'], $_POST['endDate']
            ];

        $reservation    = new ReservationService();
        try {
            $startDate = new DateTime($startDate);
            $endDate = new DateTime($endDate);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        $startDate  = $startDate->format("d/m/y H:i:s");
        $endDate    = $endDate->format("d/m/y H:i:s");

        $request = $reservation->insertData($roomId, $firstName, $lastName, $email, $startDate, $endDate);

        if ($request) {
            header("Location: ./reservationList.php?reserved=true");
        } else {
            header("Location: ./reservationList.php?reserved=false");
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room reservation</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
    </head>
    <body>

        <div id="main">

            <div id="content">

                <div id="reservation">

                    <form method="POST" action="reservation.php" class="form-default">
                        <?php

                        if (isset($_GET['roomId']) && isset($_GET['name'])) {
                            $roomId = $_GET['roomId'];

                            echo "<h2>Reserve " . $_GET['name'] . "</h2>";
                            echo "<input type='hidden' name='roomId' value='".$roomId."'>";
                        } else {
                            die('[Error] you need to choose a room!');
                        }
                        ?>
                        <div class="form-label">
                            <label>First name </label>
                        </div>
                        <div class="form-input">
                            <label><input type="text" name="firstName" placeholder="John" required/></label>
                        </div>
                        <div class="form-label">
                            <label>Second name </label>
                        </div>
                        <div class="form-input">
                            <label><input type="text" name="lastName" placeholder="Smith" required/></label>
                        </div>
                        <div class="form-label">
                            <label>Email </label>
                        </div>
                        <div class="form-input">
                            <label><input type="email" name="email" placeholder="john.smith@domain.com" required/></label>
                        </div>
                        <div class="form-label">
                            <label>From </label>
                        </div>
                        <div class="form-input">
                            <label><input type="datetime-local" name="startDate" required/></label>
                        </div>
                        <div class="form-label">
                            <label>To </label>
                        </div>
                        <div class="form-input">
                            <label><input type="datetime-local" name="endDate" required/></label>
                        </div>
                        <div class="form-label">
                            <label></label>
                        </div>
                        <div class="form-checkbox">
                            <label><input type="checkbox" name="policy" required/><span class="checkbox-text">I accept the <a href="#">terms and conditions</a> of the reservation.</span></label>
                        </div>
                        <div class="form-label">
                            <label></label>
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </form>

                    </div>

                </div>

                <div id="footer">
                    <p>&copy; Norbert Grudzień - 2022</p>
                </div>

            </div>


    </body>
</html>