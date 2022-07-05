<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BookMyRoom | Conference room reservation system</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="/">BookMyRoom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Rooms</a>
            </li>
        </ul>
    </div>
</nav>

<!--Conference rooms list-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header"><h4>Reservations</h4></div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">Reservation Id</th>
                            <th scope="col">Room id</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>5</td>
                            <td>Sierra</td>
                            <td>Ray</td>
                            <td>facilisis@risusDonec.com</td>
                            <td>07/03/22 09:00:00</td>
                            <td>07/03/22 10:00:00</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>2</td>
                            <td>Risa</td>
                            <td>Whitaker</td>
                            <td>orci.adipiscing.non@Morbisitamet.edu</td>
                            <td>20/08/22 07:30:00</td>
                            <td>20/08/22 08:30:00</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>6</td>
                            <td>Sopoline</td>
                            <td>Chang</td>
                            <td>eget.odio.Aliquam@FuscemollisDuis.edu</td>
                            <td>22/01/24 12:30:00</td>
                            <td>22/01/24 13:45:00</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>5</td>
                            <td>Beck</td>
                            <td>Herman</td>
                            <td>metus@Nuncpulvinararcu.com</td>
                            <td>03/01/23 11:40:00</td>
                            <td>03/01/23 13:30:00</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>6</td>
                            <td>Rhiannon</td>
                            <td>Fletcher</td>
                            <td>id@porttitorscelerisque.com</td>
                            <td>03/11/23 10:15:00</td>
                            <td>03/11/23 15:15:00</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>2</td>
                            <td>Georgia</td>
                            <td>Casey</td>
                            <td>dictum.cursus@placerateget.ca</td>
                            <td>28/02/22 10:00:00</td>
                            <td>28/02/22 10:55:00</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>3</td>
                            <td>Vladimir</td>
                            <td>Mcmillan</td>
                            <td>fringilla.mi@porttitortellusnon.com</td>
                            <td>14/09/23 08:15:00</td>
                            <td>14/09/23 18:15:00</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>8</td>
                            <td>Zachary</td>
                            <td>Gaines</td>
                            <td>aliquam.iaculis@tinciduntnibh.org</td>
                            <td>30/11/22 09:15:00</td>
                            <td>30/11/22 11:30:00</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>2</td>
                            <td>Cassandra</td>
                            <td>May</td>
                            <td>aliquam.iaculis@tinciduntnibh.org</td>
                            <td>30/11/22 09:15:00</td>
                            <td>30/11/22 11:30:00</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>3</td>
                            <td>Aimee</td>
                            <td>Hendricks</td>
                            <td>scelerisque.lorem@Proin.ca</td>
                            <td>02/06/23 10:30:00</td>
                            <td>02/06/23 16:00:00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>