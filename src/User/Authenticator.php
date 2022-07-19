<?php

    namespace User;
    use User\Model\UserModel;
    use User\Repository\UserRepository;
    use System\Session\Session;

    class Authenticator {

        private const SALT_LENGTH = 32;

        public function login (string $username, string $password) :bool {

            $repo = new UserRepository();
            $user = $repo->getUserByUsername($username);

            if ($this->verifyPassword($user->getSalt(), $password, $user->getPassword())) {
                $session = Session::getInstance();

                $session->set('user_id', $user->getId());
                $session->set('username', $user->getUsername());
                $session->set('firstname', $user->getFirstName());
                $session->set('lastname', $user->getLastName());
                $session->set('email', $user->getEmail());
                $session->set('salt', $user->getSalt());
                $session->set('password', $user->getPassword());
                return true;
            }
            return false;
        }

        public function register (string $username, string $firstName, string $lastName,
                                  string $email, string $password) :int {

            $repo           = new UserRepository();
            $check1         = filter_var($email, FILTER_VALIDATE_EMAIL);
            $check2         = $repo->getUserByUsername($username);
            $check3         = $repo->getUserByEmail($email);
            $lowercase      = preg_match('@[a-z]@', $password);
            $uppercase      = preg_match('@[A-Z]@', $password);
            $specialChars   = preg_match('@[^\w]@', $password);
            $number         = preg_match('@[0-9]@', $password);

            if ($username === '' || $firstName === '' || $lastName === '' || $email === '' || $password === '' ) {
                return 1;
            }

            if(!$check1) {
                return 2;
            }

            if($check2 !== null || $check3 !== null) {
                return 3;
            }

            if(!$lowercase || !$uppercase || !$specialChars || !$number || strlen($password) < 8) {
                return 4;
            }

            $id = 0;
            $salt = $this->generateSalt();
            $hash = $this->hashPassword($salt, $password);
            $user = new UserModel($id, $username, $firstName, $lastName, $email, $salt, $hash);
            $repo->addUser($user);
            return 5;
        }

        public function logout () :bool {
            $session = Session::getInstance();
            $session->destroy();
            return true;
        }

        private function generateSalt () :string {
            return str_shuffle(substr(MD5(time()), 0, self::SALT_LENGTH));
        }

        private function hashPassword(string $salt, string $password) :string {
            return password_hash($salt.$password, PASSWORD_DEFAULT);
        }

        private function verifyPassword(string $salt, string $password, string $hash) :bool {

            return password_verify($salt.$password, $hash);
        }
    }