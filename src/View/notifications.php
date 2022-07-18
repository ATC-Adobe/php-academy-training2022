<?php

if (isset($_GET['roomAdd'])) {
    if ($_GET['roomAdd'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>Room added succesfully!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while adding room!</span>
            </div>";
    }
}

if (isset($_GET['roomDelete'])) {
    if ($_GET['roomDelete'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>Room removed succesfully!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while removing room!</span>
            </div>";
    }
}

if (isset($_GET['reservationAdd'])) {
    if ($_GET['reservationAdd'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>Reservation added succesfully!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while adding reservation!</span>
            </div>";
    }
}

if (isset($_GET['reservationDelete'])) {
    if ($_GET['reservationDelete'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>Reservation removed succesfully!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while removing reservation!</span>
            </div>";
    }
}

if (isset($_GET['login'])) {
    if ($_GET['login'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>You have been logged in!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while logging to your account!</span>
            </div>";
    }
}

if (isset($_GET['register'])) {
    if ($_GET['register'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>Registration was successful!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while registering your account!</span>
            </div>";
    }
}

if (isset($_GET['logout'])) {
    if ($_GET['logout'] === 'true') {
        echo "<div class='alert alert-success' role='alert'>
                <span>You have been logged out!</span>
            </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                <span>Something went wrong while logging out from your account!</span>
            </div>";
    }
}