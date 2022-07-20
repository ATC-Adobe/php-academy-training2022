<nav class="navbar navbar-expand-lg navbar-light bg-info sticky-top">
    <a class="navbar-brand" href="/">BookMyRoom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php

            use Controller\LogoutController;

            if (isset($_SESSION['userid'])) {
                ?>
                <li class="nav-item row">
                    <a class="nav-link" href="/View/rooms.php">Rooms</a>
                    <a class="nav-link" href="/View/reservations.php">Reservations</a>
                    <a class="nav-link" href="<?php ((new LogoutController())->logout())?>">Logout</a>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item row">
                    <a class="nav-link" href="/Form/register.php">Sign up</a>
                    <a class="nav-link" href="/Form/login.php">Login</a>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>
</nav>
