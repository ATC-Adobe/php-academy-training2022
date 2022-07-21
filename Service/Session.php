<?php

namespace Service;

class Session
{
    public function checkSession()
    {
        if (isset($_SESSION['userid'])){
            return true;
        }
    }
}