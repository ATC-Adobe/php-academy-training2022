<?php
require_once "./autoload.php";
if(isset($_GET["path"])) {
    switch ($_GET["path"]) {
        case "/":
        case "":
        case "home":
            $controller = new \App\Controller\RoomController();
            $controller->index();
            exit();
        case "reservations":
            $controller = new \App\Controller\ReservationController();
            $controller->index();
            exit();
        case "reservationForm":
            $controller = new \App\Controller\ReservationController();
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $controller->store();
            } else {
                $controller->create();
            }
            exit();
        case "reservationDelete":
            $controller = new \App\Controller\ReservationController();
            $controller->delete();
            exit();
        case "roomForm":
            $controller = new \App\Controller\RoomController();
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $controller->store();
            } else {
                $controller->create();
            }
            exit();
        case "register":
            $controller = new \App\Controller\RegisterController();
            if($_SERVER['REQUEST_METHOD'] === "GET") {
                $controller->create();
            }
            exit();
        case "login":
            $controller = new \App\Controller\LoginController();
            if($_SERVER['REQUEST_METHOD'] === "GET") {
                $controller->create();
            }
            exit();
        default:
            (new \App\View\Show404())->render();
    }
} else {
    $controller = new \App\Controller\RoomController();
    $controller->index();
    exit();
}
