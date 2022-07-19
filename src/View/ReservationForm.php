<?php

namespace App\View;

use App\Service\ReservationService;
use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class ReservationForm implements Component
{
    public function render(): void
    {
        (new Header())->render("Add Reservation");
        (new Navbar())->render();
        echo '
    <form class="container mt-4" method="post" action="/reservationForm" >
        <div class="row my-3">
            <h1 class="w-100 text-center">';
        $name = $_GET['name'] ?? "";
        $id = $_GET['id'] ?? "";
        echo "Make reservation for $name";
        echo '<input class="d-none" name="room_id" value="' . $id . '"  type="text" />';

        echo '            </h1>
        </div>';
//        echo '<div class="row">';
//
//        (new FormField("First Name", "first_name"))->render();
//        (new FormField("Last Name", "last_name"))->render();
//
//        echo '</div>
//        <div class="row">';
//        (new FormField("Email", "email", "email"))->render();
//
//        echo '</div>';
        echo '<div class="row">';

        (new FormField("Start date", "start_date", "datetime-local"))->render();
        (new FormField("End date", "end_date", "datetime-local"))->render();

        echo '</div>
        <div class="my-5"></div>
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

