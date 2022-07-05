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
                <a class="nav-link" href="reservations.php">Reservations</a>
            </li>
        </ul>
    </div>
</nav>

<!--Conference rooms list-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Rooms</h4></div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Room name</th>
                            <th scope="col">Floor</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Room_1</td>
                            <td>1</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Room_2</td>
                            <td>2</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Room_3</td>
                            <td>2</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Room_4</td>
                            <td>2</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Room_5</td>
                            <td>2</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Room_6</td>
                            <td>3</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Room_7</td>
                            <td>3</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Room_8</td>
                            <td>3</td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" href="reservation_form.php">Book</a>
                            </td>
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
