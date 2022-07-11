<?php
    declare(strict_types = 1);
    require_once "./class/ReservationService.php";
    use PHPCourse\ReservationService;

    if (isset($_POST['roomId'])) {
        [ $roomId, $firstName, $lastName, $email, $startDate, $endDate ] =
            [   $_POST['roomId'], $_POST['firstName'], $_POST['lastName'],
                $_POST['email'], $_POST['startDate'], $_POST['endDate']
            ];

        try {
            $startDate = new DateTime($startDate);
            $endDate = new DateTime($endDate);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        $startDate  = $startDate->format("d/m/y H:i:s");
        $endDate    = $endDate->format("d/m/y H:i:s");

        $reservation    = new ReservationService();
        $query = "INSERT INTO reservations(room_id, firstname, lastname, email, start_date, end_date)
            VALUES($roomId,
                   '$firstName', 
                   '$lastName', 
                   '$email', 
                   str_to_date(\"$startDate\", \"%d/%m/%y %H:%i:%s\"),
                   str_to_date(\"$endDate\", \"%d/%m/%y %H:%i:%s\")
                   );
            ";

        $request = $reservation->insertDataToDatabase($query);

        //TODO: connect with file manager to read extension
        /*
        $filename = "./data/reservations.csv";

        $request = $reservation->insertData($roomId, $firstName, $lastName, $email, $startDate, $endDate);
        */
        if ($request) {
            header("Location: ./reservationListSql.php?reserved=true");
        } else {
            header("Location: ./reservationListSql.php?reserved=false");
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room reservation</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>

        <div id="main">

            <nav class="navbar navbar-dark navbar-expand-lg bg-darkcustom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">PHPCourse</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservationList.php">Reservations CSV</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservationListXml.php">Reservations XML</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservationListJson.php">Reservations JSON</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservationListSql.php">Reservations SQL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Test</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

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