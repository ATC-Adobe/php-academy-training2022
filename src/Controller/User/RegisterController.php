<?php

    namespace Controller\User;
    use User\Authenticator;

    class RegisterController {
        public function request(): void {
            if (isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&
                isset($_POST['email']) && isset($_POST['password'])) {
                $authenticator = new Authenticator();
                if ($authenticator->register(
                    $_POST['username'],
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $_POST['email'],
                    $_POST['password']
                )) {
                    header('Location: ./login.php?register=true');
                    die();
                }
                header('Location: ./login.php?register=false');
                die();
            }
        }
    }