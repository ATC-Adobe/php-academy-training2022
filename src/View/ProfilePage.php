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
        (new Header())->render(Session::getInstance()->get("nickname") . "profile");
        (new Navbar())->render();

        echo '<div class="container my-3 ">
            <h1 class="text-center">Your profile</h1>';
        if($this->alertMsg) {
            (new Alert($this->alertMsg, $this->type))->render();
        }
        echo "
        
         <div class=\"card mx-auto mt-5\" style=\"width: 18rem;\">
          <div class=\"card-header\">
          <b>
                      Hey {$this->user->nickname}!
            </b>
          </div>
          <ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\">Name: {$this->user->first_name} {$this->user->last_name}</li>
            <li class=\"list-group-item\">Email: {$this->user->email}</li>
            <li class=\"list-group-item\">Total reservations: $this->reservationsCount</li>
          </ul>
        </div>
        ";
        echo '</div>';
    }
}