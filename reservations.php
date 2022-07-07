<?php
require_once 'classes.php';
print_r($_POST);
$reservation = new ReservationService('reservations.csv');
$reservation->addReservation();
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

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-3 col-xl-12 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Please make your choice!</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Reserve room for the meeting</p>
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
                                <tr>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>Sierra</td>
                                    <td>Ray</td>
                                    <td>facilisis@risusDonec.com</td>
                                    <td>07/03/22 09:00:00</td>
                                    <td>07/03/22 10:00:00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>Risa</td>
                                    <td>Whitaker</td>
                                    <td>orci.adipiscing.non@Morbisitamet.edu</td>
                                    <td>20/08/22 07:30:00</td>
                                    <td>20/08/22 08:30:00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>6</td>
                                    <td>Sopoline</td>
                                    <td>Chang</td>
                                    <td>eget.odio.Aliquam@FuscemollisDuis.edu</td>
                                    <td>22/01/24 12:30:00</td>
                                    <td>22/01/24 13:45:00</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>Beck</td>
                                    <td>Herman</td>
                                    <td>metus@Nuncpulvinararcu.com</td>
                                    <td>03/01/23 11:40:00</td>
                                    <td>03/01/23 13:30:00</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>Rhiannon</td>
                                    <td>Fletcher</td>
                                    <td>id@porttitorscelerisque.com</td>
                                    <td>03/11/23 10:15:00</td>
                                    <td>03/11/23 15:15:00</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>2</td>
                                    <td>Georgia</td>
                                    <td>Casey</td>
                                    <td>dictum.cursus@placerateget.ca</td>
                                    <td>28/02/22 10:00:00</td>
                                    <td>28/02/22 10:55:00</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>3</td>
                                    <td>Vladimir</td>
                                    <td>Mcmillan</td>
                                    <td>fringilla.mi@porttitortellusnon.com</td>
                                    <td>14/09/23 08:15:00</td>
                                    <td>14/09/23 18:15:00</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>8</td>
                                    <td>Zachary</td>
                                    <td>Gaines</td>
                                    <td>aliquam.iaculis@tinciduntnibh.org</td>
                                    <td>30/11/22 09:15:00</td>
                                    <td>30/11/22 11:30:00</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>2</td>
                                    <td>Cassandra</td>
                                    <td>May</td>
                                    <td>ipsum.cursus@magnamalesuadavel.ca</td>
                                    <td>14/09/22 10:25:00</td>
                                    <td>14/09/22 10:45:00</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>3</td>
                                    <td>Aimee</td>
                                    <td>Hendricks</td>
                                    <td>scelerisque.lorem@Proin.ca</td>
                                    <td>02/06/23 10:30:00</td>
                                    <td>02/06/23 16:00:00</td>
                                </tr>
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
