<?php

namespace Controller;

use Model\User\Service\UpdatePasswordService;
use System\Router\Response;

class ChangePasswordController {
    public function makeRequest() {

        $stat =
            (new UpdatePasswordService())
                ->updatePassword(
                    htmlentities($_POST['currpass']),
                    htmlentities($_POST['pass1']),
                    htmlentities($_POST['pass2']));



        (new Response())
            ->goTo('/user/edit?status='.$stat);
    }
}