<?php declare(strict_types=1);
// CSV

//require_once 'classes.php';
//$reservation = new ReservationService();
//$reservations = $reservation->readReservations();
//if (count($_POST) > 0) {
//    $id = $reservation->generateReservationId();
//    $reservation->addReservation($id, $reservations);
//    $reservations = $reservation->readReservations(); // ? DRY ?
//}

// XML
//require_once 'reservations_xml.php';
//require_once 'classes.php';
//$reservations = new SimpleXMLElement($xmlstr);
//if (count($_POST) > 0){
//    $reservation = new ReservationServiceXml();
//    $id = $reservation->generateReservationId();
//    echo $id;
//    $reservation->addReservation($id);
//}


//$filename = 'reservations.json';
//
//$data = file_get_contents($filename);
//$reservations = json_decode($data);

// MySQL
require_once 'my_sql_connection.php';
$dbConnection = Connection::getInstance();

$selectQuery = "
    SELECT *
    FROM reservations;
";

if(count($_POST) > 0){
    $room_id = $_POST['room_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $start_date = new DateTime($start_date);
    $start_date = $start_date->format('Y-m-d H:i:s');
    $end_date = $_POST['end_date'];
    $end_date = new DateTime($end_date);
    $end_date = $end_date->format('Y-m-d H:i:s');
    $insertQuery = "
    INSERT INTO reservations (room_id, firstname, lastname, email, start_date, end_date)
    VALUES (
            '$room_id',
            '$firstname',
            '$lastname',
            '$email',
            STR_TO_DATE('$start_date','%Y-%m-%d %H:%i:%s'),
            STR_TO_DATE('$end_date','%Y-%m-%d %H:%i:%s')
            );
";
    $dbConnection->query($insertQuery);

}

$selectResults = $dbConnection->query($selectQuery)->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservations.php">Wszystkie rezerwacje</a></li>
                    <li class="nav-item"><a class="nav-link" href="room_form.php">Dodać pokój</a></li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-3 col-xl-12 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Thank you for your reservation!</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Here are all reservations</p>
                        <div class="text-center">
                            <table class="table table-bordered text-white table-dark room-table">
                                <tr>
                                    <th>reservation_id</th>
                                    <th>room_id</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>email</th>
                                    <th>start_date</th>
                                    <th>end_date</th>
                                </tr>
                                <?php foreach ($selectResults as $result) { ?>
                                    <tr>
                                        <td><?= $result['reservation_id']; ?></td>
                                        <td><?= $result['room_id']; ?></td>
                                        <td><?= $result['firstname']; ?></td>
                                        <td><?= $result['lastname']; ?></td>
                                        <td><?= $result['email']; ?></td>
                                        <td><?= $result['start_date']; ?></td>
                                        <td><?= $result['end_date'] ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Your Website 2021</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>