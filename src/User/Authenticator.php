<?php

    namespace User;
    use User\Model\UserModel;
    use User\Repository\UserRepository;
    use System\Session\Session;
    use System\StatusHandler\Status;

    class Authenticator {

        private const SALT_LENGTH = 32;

        public function login (string $username, string $password) :void {
            $session = Session::getInstance();
            $repo = new UserRepository();
            $user = $repo->getUserByUsername($username);

            if ($this->verifyPassword($user->getSalt(), $password, $user->getPassword())) {

                $session->set('user_id', $user->getId());
                $session->set('username', $user->getUsername());
                $session->set('firstname', $user->getFirstName());
                $session->set('lastname', $user->getLastName());
                $session->set('email', $user->getEmail());
                $session->set('salt', $user->getSalt());
                $session->set('password', $user->getPassword());

                $session->set('login', Status::LOGIN_OK);
                header ('Location: ./index.php');
                die();
            }
            $session->set('login', Status::LOGIN_INVALID);
            header ('Location: ./login.php');
            die();
        }

        public function register (string $username, string $firstName, string $lastName,
                                  string $email, string $password) :void {

            $session = Session::getInstance();
            $repo           = new UserRepository();
            $check1         = filter_var($email, FILTER_VALIDATE_EMAIL);
            $check2         = $repo->getUserByUsername($username);
            $check3         = $repo->getUserByEmail($email);
            $lowercase      = preg_match('@[a-z]@', $password);
            $uppercase      = preg_match('@[A-Z]@', $password);
            $specialChars   = preg_match('@[^\w]@', $password);
            $number         = preg_match('@[0-9]@', $password);
            $path = 'Location: ./register.php';

            if ($username === '' || $firstName === '' || $lastName === '' || $email === '' || $password === '' ) {
                $session->set('register', Status::REGISTER_EMPTY_FIELDS);
                header ($path);
                die();
            }

            if(!$check1) {
                $session->set('register', Status::REGISTER_WRONG_EMAIL);
                header ($path);
                die();
            }

            if($check2 !== null || $check3 !== null) {
                $session->set('register', Status::REGISTER_USER_OR_EMAIL_TAKEN);
                header ($path);
                die();
            }

            if(!$lowercase || !$uppercase || !$specialChars || !$number || strlen($password) < 8) {
                $session->set('register', Status::REGISTER_WEAK_PASSWORD);
                header ($path);
                die();
            }

            $id = 0;
            $salt = $this->generateSalt();
            $hash = $this->hashPassword($salt, $password);
            $user = new UserModel($id, $username, $firstName, $lastName, $email, $salt, $hash);
            $repo->addUser($user);

            $session->set('register', Status::REGISTER_OK);
            header ('Location: ./login.php');
            die();
        }

        public function logout () :void {
            $session = Session::getInstance();
            $session->destroy();
            header ('Location: ./index.php');
            die();
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