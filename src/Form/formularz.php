<?php

include("../../autoloading.php");
use User\Session;

$session = Session::getInstance();
$session->start();

include("../../layout/navbar.php");
include("../../layout/bootstrap.html");

#use Room\ReservationService;
use Reservation\ReservationRepository;

#include("reservation_class.php");

echo "<h1><strong>".$_SESSION['room_name']."</strong></h1>";

#$ourReservation = new ReservationService();
#$ourReservation->createReservation();
#$roomId = new ReservationRepository();
#$roomId->takeRoomId();

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
		    <input type="hidden" name="room_id" value=' .$_SESSION['room_id'].'>
			<input type="hidden" name="room_name" value="' .$_SESSION['room_name'].'">
			<input type="hidden" name="floor" value="' .$_SESSION['floor'].'">
			<input type="submit" value="zarezerwuj" class="btn btn-success btn-lg btn-block">
		</div>
	</div>
</form>



</body>
</html>';

