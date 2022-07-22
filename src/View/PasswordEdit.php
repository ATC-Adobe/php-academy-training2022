<?php

namespace App\View;

use App\View\Component\Alert;
use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;

class PasswordEdit implements \Component
{
    public function render($msg = ""): void
    {
        (new Header())->render("Edit password page");
        (new Navbar())->render();

        echo ' 
            <form class="container mt-4" method="post" action="/user/password">';

        echo '<div class="row my-5">
                        <h1 class="w-100 text-center">
                            Edit Password
                        </h1>
         </div>';
        echo     '<div class="row">';
        (new FormField("Password", "password", "password"))->render($msg);
        (new FormField("Repeat Password", "repeat_password", "password"))->render();
        echo '</div>';
        echo '<div class="row mt-3">
                <div class="col-11"></div>
                <button class="btn btn-primary" type="submit">Change</button>
            </div>
        </form>
        ';

        (new Footer())->render();
    }
}