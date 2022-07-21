<?php

namespace Repository;

use Database\Connection;
use PDO;
use Exception;

require_once '../../autoloading.php';

class Authentificator
{

    public function register()
    {
        $dbConnection = Connection::getInstance();
        if (count($_POST) > 0) {
            $nickname = $_POST['nickname'];
            $email = $_POST['email'];
            if ($_POST['password'] == $_POST['password_confirmation'] && !isset($_SESSION['error_email'])) {
                $password = md5($_POST['password']);

                $insertQuery = "
    INSERT INTO user (nickname, email, password, password_confirmation)
    VALUES (
            '$nickname',
            '$email',
            '$password',
            '$password'
            );
";
                $dbConnection->query($insertQuery);
                $session = Session::getInstance($nickname, $password);
                $session->start($nickname, $password);
                header('Location: http://localwsl.com/src/View/reservations.php');
            }
        }
    }

    public function login()
    {
        $dbConnection = Connection::getInstance();
        if (count($_POST) > 0) {
            $nickname = $_POST['nickname'];
            $password = md5($_POST['password']);
            $selectQuery = "
    SELECT user_id, nickname, password FROM user
    WHERE password = '$password';
";
            $loginData = $dbConnection->query($selectQuery)->fetch(PDO::FETCH_ASSOC);
            $userIdDb = $loginData['user_id'];
            $nicknameDb = $loginData['nickname'];
            $passwordDb = $loginData['password'];

            if ($nicknameDb == $nickname && $passwordDb == $password) {
                $session = Session::getInstance($nickname, $password);
                $session->start($nickname, $password);
                $_SESSION['user_id'] = $userIdDb;

                header('Location: http://localwsl.com/src/View/reservations.php');
            } else {
                echo 'you are NOT logged in';
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }
}