<?php

$session = new \Session\Session();
?>

<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?php if ($session->get() === 'true') : ?>
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            <a class="nav-link active" aria-current="page" href="../View/logout.php">Wyloguj</a>
            <a class="nav-link active" aria-current="page" href="../View/myReservations.php">Moje Rezerwacje</a>
            <a class="nav-link active" aria-current="page" href="../View/roomAdd.php">Dodaj Salę</a>
            <a class="nav-link active" aria-current="page" href="../View/reservationsList.php">Wszystkie Rezerwacje</a>
            <?php
            else: ?>
                <a class="nav-link active" aria-current="page" href="../View/login.php">Logowanie</a>
                <a class="nav-link active" aria-current="page" href="../View/registration.php">Rejestracja</a>
            <?php
            endif; ?>
            <div id="username"><?php
                if ($session->get() === 'true') {
                    echo "Cześć " . $session->display() . "! Fajnie że jesteś" ?? null;
                } ?></div>
        </div>
    </div>
</nav>

<div class="room-name">
    Biuro PHP
</div>