<?php

namespace App\View;

use App\Model\Reservation;
use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;

class ReservationUpdateForm implements \Component
{
    public function __construct(protected Reservation $reservation)
    {
    }

    public function render(string $msg = ""): void
    {
        (new Header())->render("Change Reservation");
        (new Navbar())->render();
        echo '
<form class="container mt-4" method="post" action="/reservationUpdate" >
    <input type="hidden" name="reservation_id" value="'.$this->reservation->id .'" />
    <div class="row my-3">
        <h1 class="w-100 text-center">
            Change your reservation '. $this->reservation->user->first_name.' '.$this->reservation->user->last_name.'
        </h1>
    </div>';
        (new FormField("Start date ( current: ". $this->reservation->start_date .")","start_date", "datetime-local"))->render($msg);
        (new FormField("End date( current: ". $this->reservation->end_date .")","end_date" ,"datetime-local"))->render();

    echo '<div class="row mt-3">
        <div class="col-5"></div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
        ';
        (new Footer())->render();
    }
}