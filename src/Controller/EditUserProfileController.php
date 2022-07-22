<?php

namespace Controller;

use Model\User\Service\UpdateUserDetailsService;
use System\Router\Response;
use System\Status;

class EditUserProfileController {
    public function makeRequest() : void {

        $res =
            // mock, no real logic here yet
            (new UpdateUserDetailsService())
                ->updateUserDetails(
                    htmlentities($_POST['name']),
                    htmlentities($_POST['surname']),
                    htmlentities($_POST['email']),
                    htmlentities($_POST['username']),
                );

        (new Response())
            ->goTo('/user/edit?status='.$res);
    }
}