<?php

    namespace Controller\User;
    use User\Authenticator;

    class RegisterController {
        public function request(): void {
            if (isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&
                isset($_POST['email']) && isset($_POST['password'])) {
                $authenticator = new Authenticator();
                $authenticator->register(
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['firstname']),
                    htmlspecialchars($_POST['lastname']),
                    htmlspecialchars($_POST['email']),
                    htmlspecialchars($_POST['password'])
                );
            }
        }
    }