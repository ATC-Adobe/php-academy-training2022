<?php

namespace App\View;

use App\View\Component\Alert;
use App\View\Component\Footer;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class ReservationList implements Component
{
    public function __construct(protected bool|iterable $reservations, protected string $alertMsg ="", protected string $type="danger")
    {
    }

    public function render(): void
    {
//                $handler = SaveHandlerFactory::create("./System/File/data/reservations.xml");
//                $reservations = (new ReservationService($handler))->readReservations();
        (new Header())->render("All reservations");
        (new Navbar())->render();

        echo '<div class="container my-3">
            <h1 class="text-center">All reservations</h1>';
        if($this->alertMsg) {
            (new Alert($this->alertMsg, $this->type))->render();
        }

        if ($this->reservations === false) {
            echo '<div class="alert alert-danger text-center">Something went wrong. Try again</div>';
        }
        for ($i = 0; $i < count($this->reservations); $i++) {
            if (!($i % 2)) {
                echo '<div class="row">';
            }
            echo '<div class="col col-md-6 listItem pt-3">';
            echo '<h6>Reservation id: ' . $this->reservations[$i]->id . '</h6>';
            echo '<ul class="w-100">';
            echo '<li>room name: ' . $this->reservations[$i]->room->name . '</li>';
            echo '<li>room floor: ' . $this->reservations[$i]->room->floor . '</li>';
            echo '<li>user: ' . substr($this->reservations[$i]->user->nickname,0,5) . '...</li>';
//            echo '<li>last name: ' . $this->reservations[$i]->user->last_name . '</li>';
//            echo '<li>email: ' . $this->reservations[$i]->email . '</li>';
            echo '<li>start_date: ' . $this->reservations[$i]->start_date . ' </li>';
            echo '<li>end_date: ' . $this->reservations[$i]->end_date . ' </li>';
            echo '</ul>';
            echo '<div>';
//            echo '<form class="my-3" method="post" action="/reservationDelete">
//        <input type="hidden" name="reservation_id" value="' . $this->reservations[$i]->id . '"/>
//        <button type="submit" class="btn btn-danger">Delete</button>
//            </form>';
//            echo '<form class="my-3" method="get" action="/reservationUpdate">
//        <input type="hidden" name="reservation_id" value="' . $this->reservations[$i]->id . '"/>
//        <button type="submit" class="btn btn-primary">Update</button>
//            </form>';
            echo '</div>';
            echo '</div>';
            if (($i % 2)) {
                echo '</div>';
            }
        }
        (new Footer())->render();
    }
}
