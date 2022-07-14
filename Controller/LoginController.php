<?php

namespace App\Controller;

class LoginController
{
    public function create() {
        (new \App\View\LoginForm())->render();
    }
    public function store() {
//        TODO
    }
}