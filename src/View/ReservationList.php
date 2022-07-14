<?php

namespace App\View;

use App\Service\ReservationService;
use App\System\File\IOHandlerFactory;
use App\View\Component\Footer;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class ReservationList implements Component
{


    public function render(string $msg = ""): void
    {
        $reservations = (new ReservationService())->readReservations(true);
//                $handler = SaveHandlerFactory::create("./System/File/data/reservations.xml");
//                $reservations = (new ReservationService($handler))->readReservations();
        (new Header())->render("All reservations");
        (new Navbar())->render();

        echo '<div class="container my-3">
            <h1 class="text-center">All reservations</h1>';
        if ($msg) {
            echo '<div class="alert alert-info text-center">' . $msg . '</div>';
        }

        if ($reservations === false) {
            echo '<div class="alert alert-danger text-center">Something went wrong. Try again</div>';
        }
        for ($i = 0; $i < count($reservations); $i++) {
            if (!($i % 2)) {
                echo '<div class="row">';
            }
            echo '<div class="col col-md-6 listItem pt-3">';
            echo '<h6>Reservation id: ' . $reservations[$i]->id . '</h6>';
            echo '<ul class="w-100">';
            echo '<li>room name: ' . $reservations[$i]->room->name . '</li>';
            echo '<li>room floor: ' . $reservations[$i]->room->floor . '</li>';
            echo '<li>first name: ' . $reservations[$i]->first_name . '</li>';
            echo '<li>last name: ' . $reservations[$i]->last_name . '</li>';
            echo '<li>email: ' . $reservations[$i]->email . '</li>';
            echo '<li>start_date: ' . $reservations[$i]->start_date . ' </li>';
            echo '<li>end_date: ' . $reservations[$i]->end_date . ' </li>';
            echo '</ul>';
            echo '<form method="post" action="/reservationDelete">
        <input type="hidden" name="reservation_id" value="' . $reservations[$i]->id . '"/>
        <button type="submit" class="btn btn-danger">Delete</button>
            </form>';
            echo '</div>';
            if (($i % 2)) {
                echo '</div>';
            }
        }
        (new Footer())->render();
    }
}
