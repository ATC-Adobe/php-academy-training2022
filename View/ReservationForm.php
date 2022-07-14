<?php

namespace App\View;

use App\Service\ReservationService;
use App\View\Component\Footer;
use App\View\Component\Header;
use App\View\Component\Navbar;

class ReservationForm {
    public function render(): void
    {
        (new Header())->render("Add Reservation");
        echo '<body class="background">';
        (new Navbar())->render();
echo '
    <form class="container mt-4" method="post" action="reservationFormPost.php" >
        <div class="row my-3">
            <h1 class="w-100 text-center">';
                $name = $_GET['name'] ?? "";
                $id = $_GET['id'] ?? "";
                echo "Make reservation for $name";
                echo '<input class="d-none" name="room_id" value="'. $id .'"  type="text" />';

echo '            </h1>

        </div>
        <div class="row">
            <div class="col col-lg-6">
                <label class="d-flex justify-content-between"> First Name <input required class="myInput" type="text" name="first_name" /></label>
            </div>
            <div class="col col-lg-6">
                <label class="d-flex justify-content-between"> Last Name <input required class="myInput" type="text" name="last_name" /></label>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Email <input required class="myInput" type="email" name="email"/></label>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <label class="d-flex justify-content-between"> Start date <input required name="start_date" class="myInput" type="datetime-local" /></label>
            </div>
            <div class="col col-lg-6">
                <label class="d-flex justify-content-between"> End date <input required name="end_date" class="myInput" type="datetime-local" /></label>
            </div>
        </div>
        <div class="row mt-3 d-flex justify-content-around mx-5">
            <input name="xml" class="btn btn-primary" type="submit" value="Submit to xml" /> 
            <input name="csv" class="btn btn-primary" type="submit" value="Submit to csv" /> 
            <input name="json" class="btn btn-primary" type="submit" value="Submit to json" /> 
            <input name="sql" class="btn btn-primary" type="submit" value="Submit to mysql" /> 
        </div>
    </form>
        ';
        (new Footer())->render();
    }
}

