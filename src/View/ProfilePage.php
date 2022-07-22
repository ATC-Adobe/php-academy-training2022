<?php

namespace App\View;

use App\Model\Session;
use App\Model\User;
use App\View\Component\Alert;
use App\View\Component\Header;
use App\View\Component\Navbar;

class ProfilePage implements \Component
{
    public function __construct(protected User $user, protected int $reservationsCount, protected string $alertMsg ="", protected string $type="danger")
    {
    }

    public function render(): void
    {
        (new Header())->render(Session::getInstance()->get("nickname") . " Profile");
        (new Navbar())->render();

        echo '<div class="container my-3 ">
            <h1 class="text-center">Your profile</h1>';
        if($this->alertMsg) {
            (new Alert($this->alertMsg, $this->type))->render();
        }
        echo "
        <div class='row'>
        <div class='col-1 col-lg-2 '></div>
             <div class=\"card px-0 mt-5 text-center col-10 col-lg-8\" style=\"width: 18rem;\">
              <div class=\"card-header\">
              <h3>
                          Hey {$this->user->nickname}!
                </h3>
              </div>
              <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\"><h5>Name: {$this->user->first_name} {$this->user->last_name} </h5></li>
                <li class=\"list-group-item\"><h5>Email: {$this->user->email} </h5></li>
                <li class=\"list-group-item\"><a href='/user/edit'><h5>Edit User </h5></a></li>
                <li class=\"list-group-item\"><a href='/user/password'><h5>Change password </h5></a></li>
                <li class=\"list-group-item\"><h5>Total reservations: $this->reservationsCount </h5></li>
              </ul>
            </div>
        <div class='col-1 col-lg-2 '></div>
        </div>
        ";
        echo '</div>';
    }
}