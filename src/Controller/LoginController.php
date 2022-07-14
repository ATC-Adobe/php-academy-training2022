<?php

namespace App\Controller;

class LoginController
{
    public function create(): void
    {
        (new \App\View\LoginForm())->render();
    }
    public function store() {
//        TODO
    }
}