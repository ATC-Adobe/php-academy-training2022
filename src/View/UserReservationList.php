<?php

namespace App\View;

use App\View\Component\Header;
use App\View\Component\Navbar;

class UserReservationList implements \Component
{
    public function __construct(protected bool|iterable $reservations)
    {
    }

    public function render(string $msg = ""): void
    {
        (new Header())->render("Your reservations");
        (new Navbar())->render();
        echo '<div class="container my-3">
            <h1 class="text-center">Your reservations</h1>';

        if ($msg) {
            echo '<div class="alert alert-info text-center">' . $msg . '</div>';
        }

        if ($this->reservations === false) {
            echo '<div class="alert alert-danger text-center">Something went wrong. Try again</div>';
        }
        if($this->reservations === []) {
            echo "<div class=\"alert alert-info text-center\">You don't have any reservations!</div>";
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
//            echo '<li>first name: ' . $this->reservations[$i]->user->first_name . '</li>';
//            echo '<li>last name: ' . $this->reservations[$i]->user->last_name . '</li>';
//            echo '<li>email: ' . $this->reservations[$i]->email . '</li>';
            echo '<li>start_date: ' . $this->reservations[$i]->start_date . ' </li>';
            echo '<li>end_date: ' . $this->reservations[$i]->end_date . ' </li>';
            echo '</ul>';
            echo '<div>';
            echo '<form class="my-3" method="post" action="/reservationDelete">
        <input type="hidden" name="reservation_id" value="' . $this->reservations[$i]->id . '"/>
        <button type="submit" class="btn btn-danger">Delete</button>
            </form>';
            echo '<form class="my-3" method="get" action="/reservationUpdate">
        <input type="hidden" name="reservation_id" value="' . $this->reservations[$i]->id . '"/>
        <button type="submit" class="btn btn-primary">Update</button>
            </form>';
            echo '</div>';
            echo '</div>';
            if (($i % 2)) {
                echo '</div>';
            }
        }
    }
}