<?php

use System\StatusHandler\Status;

function getAlert (array $alert) :void {
    echo "<div class='alert alert-".$alert['type']."' role='alert'>
            <span>".$alert['msg']."</span>
        </div>";
}

if ($session->get('register')) {
    getAlert(Status::getStatus($session->get('register')));
    $session->unset('register');
}

if ($session->get('login')) {
    getAlert(Status::getStatus($session->get('login')));
    $session->unset('login');
}

if ($session->get('reservation')) {
    getAlert(Status::getStatus($session->get('reservation')));
    $session->unset('reservation');
}

if ($session->get('room')) {
    getAlert(Status::getStatus($session->get('room')));
    $session->unset('room');
}