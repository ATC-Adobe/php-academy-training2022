<?php

declare(strict_types=1);

require_once '../autoloading.php';

include "../Layout/head.php";
include "../Layout/navbar.php";

use Controller\CreateRoomController;

$name = '';
$floor = '';
$error = '';



[$error, $name, $floor] = (new CreateRoomController())->createRoom($error, $name, $floor);
?>

<body>

<!--Booking form-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Book a Room</h4></div>
                <div class="card-body">
                    <form action="" method="post">
                        <?php
                        echo $error;
                        ?>

                        <div class="form-group">
                            <label for="firstname">Room name</label>
                            <input type="text" class="form-control" name="name" value="<?php
                            echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Floor</label>
                            <input type="text" class="form-control" name="floor" value="<?php
                            echo $floor; ?>">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" href="/" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</a>
                <button type="submit" name="submit" class="btn btn-outline-success">Save</button>
            </div>
            </form>
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