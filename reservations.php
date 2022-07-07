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
            <li class="nav-item row">
                <a class="nav-link" href="/">Rooms with csv</a>
                <a class="nav-link" href="rooms_json.php">Rooms with Json</a>
                <a class="nav-link" href="rooms_xml.php">Rooms with XML</a>
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

                    <?php
                    $message = 'Your booking is confirmed.';
                    include "helpers/message-add.php";
                    include 'ReservationList.php';
                    $reservationList = new ReservationList();
                    $reservations = $reservationList->getList();
                    ?>

                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                        <tr>
                            <th>Reservation Id</th>
                            <th>Room id</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Start date</th>
                            <th>End date</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($reservations as $res):
                            ?>

                            <tr>
                                <th><?php echo $res['reservation_id']; ?></th>
                                <td><?php echo $res['room_id']; ?></td>
                                <td><?php echo $res['firstname']; ?></td>
                                <td><?php echo $res['lastname']; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td><?php echo $res['start_date']; ?></td>
                                <td><?php echo $res['end_date']; ?></td>
                            </tr>

                        <?php
                        endforeach;
                        ?>

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
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $("#bookSaved").remove();
        }, 5000);
    });
</script>
</html>