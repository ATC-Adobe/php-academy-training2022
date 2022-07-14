<?php

namespace App\View;

use App\View\Component\Footer;
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
<form class="container mt-4" method="post" action="/?path=roomForm" >
    <div class="row my-3">
        <h1 class="w-100 text-center">
            Add another room
        </h1>
    </div>
        <div class="col col-lg-8">
            <label class="d-flex justify-content-between"> room name <input required class="myInput" type="text" name="name" /></label>
        </div>
        <div class="col col-lg-8">
            <label class="d-flex justify-content-between"> floor <input required class="myInput" type="text" name="floor" /></label>
        </div>
    <div class="row mt-3">
        <div class="col-7"></div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
        ';
        (new Footer())->render();
    }

}

