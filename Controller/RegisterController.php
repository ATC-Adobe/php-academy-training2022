<?php

namespace App\Controller;

use App\View\RegisterForm;

class RegisterController
{
    public function create() {
        (new RegisterForm())->render();
    }
    public function store() {
//        TODO
    }
}