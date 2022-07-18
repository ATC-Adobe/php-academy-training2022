<?php

    namespace Controller\User;
    use User\Authenticator;

    class LoginController {
        public function request(): void {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $authenticator = new Authenticator();
                if ($authenticator->login(
                    $_POST['username'],
                    $_POST['password']
                )) {
                    header('Location: ./index.php?login=true');
                    die();
                }
                header('Location: ./login.php?login=false');
                die();
            }
        }
    }