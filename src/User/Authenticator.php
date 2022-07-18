<?php

    namespace User;
    use User\Model\UserModel;
    use User\Repository\UserRepository;

    class Authenticator {

        public function login (string $username, string $password) :bool {

            $repo = new UserRepository();
            $user = $repo->getUserByUsername($username);

            if ($password === $user->getPassword()) {
                session_start();
                $_SESSION['username'] = $user->getUsername();
                return true;
            }
            return false;
        }

        public function register (string $username, string $firstName, string $lastName,
                                  string $email, string $password) :bool {
            //TODO: Validate with unique username and email

            if ($username === '' || $firstName === '' || $lastName === '' || $email === '' || $password === '' ) {
                return false;
            }

            $id = 0;
            $user = new UserModel($id, $username, $firstName, $lastName, $email, $password);
            $repo = new UserRepository();
            $repo->addUser($user);
            return true;
        }

        public function logout () :bool {
            if (isset ($_SESSION['username'])) {
                unset($_SESSION['username']);
                return true;
            }
            return false;
        }
    }