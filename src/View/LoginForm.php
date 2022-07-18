<?php

namespace App\View;

use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class LoginForm implements Component
{
    public function render($msg = ""): void
    {
        (new Header())->render("Register page");
        (new Navbar())->render();
        echo ' 
<form class="container mt-4" method="post" action="/login">
        <div class="row my-3">
                        <h1 class="w-100 text-center">
                            Login
                        </h1>
         </div>';
        (new FormField("Email", "email"))->render($msg);
        (new FormField("Password", "password", "password"))->render();

    echo '<div class="row mt-3">
        <div class="col-5"></div>
        <button class="btn btn-primary" type="submit">Log in</button>
    </div>
</form>
        ';
        (new Footer())->render();
    }
}