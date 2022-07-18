<?php

    namespace Controller\User;
    use User\Authenticator;

    class LogoutController {
        public function request(): void {
            if (isset($_SESSION['username'])) {
                $authenticator = new Authenticator();
                if ($authenticator->logout()) {
                    header('Location: ./index.php?logout=true');
                    die();
                }
                header('Location: ./index.php?logout=false');
                die();
            }
        }
    }