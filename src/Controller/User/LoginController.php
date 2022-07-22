<?php

    namespace Controller\User;
    use User\Authenticator;

    class LoginController {
        public function request(): void {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $authenticator = new Authenticator();
                $authenticator->login(
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['password'])
                );
            }
        }
    }