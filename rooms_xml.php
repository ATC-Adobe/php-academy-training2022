<?php

include "views/layouts/head.php";
include "views/layouts/navbar.php";

?>

<body>

<!--Conference rooms list-->
<div class="container">
    <div class="row justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Rooms</h4></div>
                <div class="card-body">

                    <?php
                        include_once 'services/RoomListXml.php';
                        $rooms = (new RoomListXml())->getRoomListXml();
                    ?>

                    <table class="table table-striped table-hover table-borderless">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Room name</th>
                            <th>Floor</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($rooms as $room):
                            ?>

                            <tr>
                                <th><?php echo $room['room_id']; ?></th>
                                <td><?php echo $room['name']; ?></td>
                                <td><?php echo $room['floor']; ?></td>
                                <td>
                                    <?php echo "<a class=\"btn btn-sm btn-outline-success\" href=\"/reservation_form.php?room_id={$room['room_id']}&name={$room['name']}\">Book</a>"; ?>
                                </td>
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
</html>

