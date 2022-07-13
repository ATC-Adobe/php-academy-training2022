<?php

namespace App\View;

use App\View\Component\Navbar;

class RoomForm {
    public function render(): void
    {
        echo '
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add room</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/View/css/style.css">

</head>
<body class="background">';
        (new Navbar())->render();
        echo '
<form class="container mt-4" method="post" action="/roomFormPost.php" >
    <div class="row my-3">
        <h1 class="w-100 text-center">
            Add another room
        </h1>
    </div>
        <div class="col col-lg-8">
            <label class="d-flex justify-content-between"> room name <input required class="myInput" type="text" name="name" /></label>
        </div>
        <div class="col col-lg-8">
            <label class="d-flex justify-content-between"> floor <input required class="myInput" type="text" name="floor" /></label>
        </div>
    <div class="row mt-3">
        <div class="col-7"></div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
        ';
    }

}

