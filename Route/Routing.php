<?php

namespace Route;

class Routing
{
    public function getReservationList():void
    {
        header('location:reservations.php?msg=add');
    }

    public function getRoomList():void
    {
        header('location:index.php?msg=add');
    }

    public function roomView(){
        $this->load->view('/View/rooms.php');
    }
}