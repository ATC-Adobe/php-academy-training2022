<?php

namespace App\View;

use App\View\Component\Footer;
use App\View\Component\Header;
use App\View\Component\Navbar;

class LoginForm
{
    public function render(): void
    {
        (new Header())->render("Register page");
        (new Navbar())->render();
        echo '
              <div class="row my-3">
                <h1 class="w-100 text-center">
                    Login
                </h1>
            </div>';
        echo ' 
<form class="container mt-4" method="post" action="login.php">
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Email <input required class="myInput" type="email" name="email"/></label>
        </div>
        <div class="col col-lg-6">
            <label class="d-flex justify-content-between"> Password <input required name="password" class="myInput" type="password" /></label>
        </div>
    <div class="row mt-3">
        <div class="col-5"></div>
        <button class="btn btn-primary" type="submit">Login</button>
    </div>
</form>
        ';
        (new Footer())->render();
    }
}