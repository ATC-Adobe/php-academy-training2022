<?php

namespace App\View;

use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class RegisterForm implements Component
{
    public function render(): void
    {
        (new Header())->render("Login page");
        (new Navbar())->render();
        echo '
<form class="container mt-4" method="post" action="/register">
            <div class="row my-3">
                <h1 class="w-100 text-center">
                    Register
                </h1>
            </div>
    <div class="row">';
        (new FormField("First Name", "first_name"))->render();
        (new FormField("Last Name", "last_name"))->render();
    echo '</div>
    <div class="row">';
        (new FormField("Email", "email", "email"))->render();
        (new FormField("Nickname", "nickname"))->render();
    echo '</div>
    <div class="row">';
        (new FormField("Password", "password", "password"))->render();
        (new FormField("Repeat Password", "repeat_password", "password"))->render();
    echo '</div>
        <div class="row mt-3">
            <div class="col-11"></div>
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
</form>
        ';
        (new Footer())->render();
    }
}