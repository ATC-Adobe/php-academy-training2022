<?php

namespace App\View;

use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class RoomForm implements Component
{
    public function render(): void
    {
        (new Header())->render("Add room");
        (new Navbar())->render();
        echo '
<form class="container mt-4" method="post" action="/roomForm" >
    <div class="row my-3">
        <h1 class="w-100 text-center">
            Add another room
        </h1>
    </div>';

        (new FormField("Room Name", "name"))->render();
        (new FormField("Floor", "floor"))->render();

    echo '<div class="row mt-3">
        <div class="col-5"></div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
        ';
        (new Footer())->render();
    }

}

