<?php

#include("autoloading.php");
include("../../layout/navbar.html");
include("../../layout/bootstrap.html");

#include("reservation_class.php");

echo "<h1><strong>".$_GET['room_id']."</strong></h1>";


echo '
<body>

<form method="POST" action="../View/roomsReservation.php">
    <div class="row">
        <div class="col">
            <input type="text" placeholder="Imie" name="firstname" class="form-control"/>
        </div>
        <div class="col">
            <input type="text" name="lastname" class="form-control" placeholder="Nazwisko">
        </div>
    </div>
	<div class="row">
        <div class="col">
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="datetime-local" name="startdate" class="form-control" placeholder="od DD/MM/RRRR godzina 00:00:00">
        </div>
        <div class="col">
            <input type="datetime-local" name="enddate" class="form-control" placeholder="do DD/MM/RRRR godzina 00:00:00">
        </div>
    </div>
	<div class="row">
		<div class="col">
			<input type="hidden" name="room_id" value="' .$_GET['room_id'].'">
			<input type="hidden" name="floor" value="' .$_GET['floor'].'">
			<input type="submit" value="zarezerwuj" class="btn btn-success btn-lg btn-block">
		</div>
	</div>
</form>



</body>
</html>';

