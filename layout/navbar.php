<?php
require 'autoloading.php';
use src\LogIn\Repository\Session;
session_start();
echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="reservationsList.php">Reservations List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addRoom.php">Add Room</a>
        </li>';
if(!empty($_SESSION['nickname'])){
    $nickname = $_SESSION['nickname'];
    echo
        '<li class="nav-item">
            <a class="nav-link" href="myReservations.php">My Reservations</a>
        </li>
<li class="nav-item">
            <a class="nav-link">Welcome, '.$nickname.'</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"><form method="post"><input type="hidden" name="logout" value="Logout" /><input type="submit" value="Logout"></form></a>
        </li>';
}
else {
    echo
            '<li class="nav-item">
            <a class="nav-link" href="registration.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>';
}
//'<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
//    <ul class="navbar-nav">
//        <li class="nav-item">
//            <a class="nav-link" href="index.php">Home</a>
//        </li>
//        <li class="nav-item">
//            <a class="nav-link" href="reservationsList.php">Reservations List</a>
//        </li>
//        <li class="nav-item">
//            <a class="nav-link" href="addRoom.php">Add Room</a>
//        </li>
//
//        <li class="nav-item">
//            <a class="nav-link" href="registration.php">Register</a>
//        </li>
//        <li class="nav-item">
//            <a class="nav-link" href="login.php">Login</a>
//        </li>
//        <li class="nav-item">
//            <a class="nav-link"><form method="post"><input type="hidden" name="logout" value="Logout" /><input type="submit" value="Logout"></form></a>
//        </li>
//    </ul>
//
//</nav>';
echo     '</ul>
</nav>';