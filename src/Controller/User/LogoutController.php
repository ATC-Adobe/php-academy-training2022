<?php

    namespace Controller\User;
    use User\Authenticator;

    class LogoutController {
        public function request(): void {
            if (isset($_SESSION['username'])) {
                $authenticator = new Authenticator();
                $authenticator->logout();
            }
        }
    }