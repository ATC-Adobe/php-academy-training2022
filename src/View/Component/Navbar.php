<?php
namespace App\View\Component;
use App\Model\Session;
use Component;

class Navbar implements Component
{
    public function render(): void
    {
        echo '
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/reservations">Current reservations</a>
                </li>';
        if(Session::getInstance()->get("user_id")) {
            echo '
                <li class="nav-item">
                    <a class="nav-link" href="/roomForm">Add room</a>
                </li>
            ';
        }
        echo ' 
            </ul>
            <ul class="navbar-nav ml-auto">';
        if(Session::getInstance()->get("user_id")) {
            echo '
                <li class="nav-item">
                    <a  class="nav-link">Hello '. ucfirst(Session::getInstance()->get("nickname") ?? "") .'</a>
                </li>
                <li class="nav-item">
                                            <a href="/userReservations" class="nav-link" >Your reservations</a>
                </li>
                <li class="nav-item">
                                            <a href="/logout" class="nav-link" >Logout</a>
                </li>
            ';
        } else {
            echo '
                 <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            ';
        }
       echo ' </ul>
        </div>
    </nav>
        ';
    }
}