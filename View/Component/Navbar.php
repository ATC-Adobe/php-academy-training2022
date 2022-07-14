<?php
namespace App\View\Component;
class Navbar
{
    public function render(): void
    {
        echo '
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/reservations.php">Current reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/roomForm.php">Add room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/loginForm.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/registerForm.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
        ';
    }
}