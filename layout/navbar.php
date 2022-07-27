<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>navbar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../../src/Form/formularzRoom.php">Add room</a>
                <a class="nav-link active" aria-current="page" href="../../src/View/roomsReservation.php">All reservations</a>
                <?php if(!isset($_SESSION['nickname'])){ ?>
                <a class="nav-link active" aria-current="page" href="../../src/Form/loginForm.php">Login</a>
                <a class="nav-link active" aria-current="page" href="../../src/Form/registrationForm.php">Register</a>
                <?php } else { ?>
                <a class="nav-link active" aria-current="page" href="../../src/Controller/logOut.php">Log out</a>
                <a class="nav-link active" aria-current="page" href="../../src/View/myReservations.php">My reservations</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>
</body>
</html>