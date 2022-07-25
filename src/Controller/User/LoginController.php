<?php

    namespace Controller\User;
    use User\Authenticator;
    use User\Model\UserModel;

    class LoginController {
        public function request(): void {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $authenticator = new Authenticator();
                if ($authenticator->login(
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['password'])
                ) instanceof UserModel) {
                    header ('Location: ./index.php');
                } else {
                    header ('Location: ./login.php');
                }
                die();
            }
        }
    }