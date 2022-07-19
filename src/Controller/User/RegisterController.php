<?php

    namespace Controller\User;
    use User\Authenticator;

    class RegisterController {
        public function request(): void {
            if (isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&
                isset($_POST['email']) && isset($_POST['password'])) {
                $authenticator = new Authenticator();
//                if ($authenticator->register(
//                    $_POST['username'],
//                    $_POST['firstname'],
//                    $_POST['lastname'],
//                    $_POST['email'],
//                    $_POST['password']
//                )) {
//                    header('Location: ./login.php?register=true');
//                    die();
//                }
//                header('Location: ./login.php?register=false');
//                die();

                match ($authenticator->register(
                    $_POST['username'], $_POST['firstname'], $_POST['lastname'],
                    $_POST['email'], $_POST['password'])) {
                    1       => header ('Location: ./register.php?regError=1'),
                    2       => header ('Location: ./register.php?regError=2'),
                    3       => header ('Location: ./register.php?regError=3'),
                    4       => header ('Location: ./register.php?regError=4'),
                    5       => header ('Location: ./login.php?register=true'),
                    default => header ('Location: ./register.php?register=false')
                };
            }
        }
    }