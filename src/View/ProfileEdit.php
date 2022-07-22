<?php

namespace App\View;

use App\Model\User;
use App\View\Component\Alert;
use App\View\Component\Footer;
use App\View\Component\FormField;
use App\View\Component\Header;
use App\View\Component\Navbar;

class ProfileEdit implements \Component
{

    public function __construct(protected User $user, protected string $alertMsg ="", protected string $type="danger")
    {
    }

    public function render($msg = "", $type = ""): void
    {
        (new Header())->render("Edit profile page");
        (new Navbar())->render();

        echo ' 
            <form class="container mt-4" method="post" action="/user/edit">';

        echo '<div class="row my-3">
                        <h1 class="w-100 text-center">
                            Edit profile
                        </h1>
         </div>';
        if($this->alertMsg) {
            (new Alert($this->alertMsg, $this->type))->render();
        }
        echo '<div class="row">';
        (new FormField("First Name", "first_name", required: false))->render(value: $this->user->first_name);
        (new FormField("Last Name", "last_name", required: false))->render(value: $this->user->last_name);

        echo '</div>
        <div class="row">';
            (new FormField("Email", "email", "email" , required: false))->render($type === "email" ? $msg : "", value: $this->user->email );
            (new FormField("Nickname", "nickname",  required: false))->render($type === "nickname" ? $msg : "", value: $this->user->nickname);

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