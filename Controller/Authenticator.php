<?php
namespace Controller;
require 'autoloading.php';
require_once 'src/Registration/Repository/RegistrationRepository.php';
include_once 'System/Database/Connection.php';
include_once 'src/LogIn/Repository/Session.php';
use System\Database\Connection;
use src\LogIn\Repository\Session;
use PDO;
use src\Registration\Repository\RegistrationRepository;
use src\Registration\Model\RegistrationModel;
use src\LogIn\Model\LogInModel;
use src\LogIn\Repository\LogInRepository;


class Authenticator {
    public string $password;
    public function __construct() { }
    private static function _Hash($password, $sDist=NULL):string{
        return $sDist.sha1($sDist.$password);
    }

    public static function register() : void {


            $registration = new RegistrationRepository($_REQUEST['name'],$_REQUEST['surname'],$_REQUEST['email'],
                $_REQUEST['nickname'],self::_Hash($_REQUEST['password'],$_REQUEST['nickname']));
            $registration->saveRegistration();

        }

    public static function logIn() : void
    {
            if (!empty($_POST)) {
                $nickname = $_POST['nickname'];
                $password = self::_Hash($_REQUEST['password'],$_REQUEST['nickname']);

                $login = LogInRepository::findUser($nickname,$password)->fetch(PDO::FETCH_ASSOC);
                $nicknameDb = $login['nickname'];
                $passwordDb = $login['password'];
                $userID = $login['user_id'];

                if ($nicknameDb == $nickname && $passwordDb == $password) {
                    $session = Session::getInstance();
                    $session->start($nickname, $password, $userID);
                    header('location:index.php');
                } else {
                    echo 'You are not logged in';
                }
            }
        }

        public static function logOut(){
        Session::sessionDestroy();
            header('location:index.php');
        }

}

