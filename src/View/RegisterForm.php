<?php

namespace App\View;

use App\View\Component\Footer;
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
              <div class="row my-3">
                <h1 class="w-100 text-center">
                    Register
                </h1>
            </div>';
        echo '
<form class="container mt-4" method="post" action="/?path=register">
    <div class="row">
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> First Name <input required class="myInput" type="text" name="first_name" /></label>
        </div>
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Last Name <input required class="myInput" type="text" name="last_name" /></label>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Email <input required class="myInput" type="email" name="email"/></label>
        </div>
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Nickname <input required class="myInput" type="text" name="nickname"/></label>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Password <input required name="password" class="myInput" type="password" /></label>
        </div>
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Repeat Password <input required name="repeat_password" class="myInput" type="password" /></label>
        </div>
    </div>
        <div class="row mt-3">
            <div class="col-10"></div>
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
</form>
        ';
        (new Footer())->render();
    }
}