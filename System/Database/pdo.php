<?php declare(strict_types = 1);


class Singleton {
    protected static ?singleton $obj = null;

    protected function __construct() { }

    public static function getInstance() : singleton {
        if(singleton::$obj === null)
            singleton::$obj = new singleton();
        return singleton::$obj;
    }

    public function __toString() {
        return "test";
    }

}


class MySqlConnection extends PDO {

    protected static ?MySqlConnection $conn = null;

    protected static string $SERVERNAME = "mysql";
    protected static string $USERNAME   = "app";
    protected static string $PASSWORD   = "qwerty";
    protected static string $DBNAME     = "app";

    protected function __construct() {
        parent::__construct(
            "mysql:host=".self::$SERVERNAME.
            ";dbname=".self::$DBNAME,
            self::$USERNAME,
            self::$PASSWORD,
        );
    }

    public static function getInstance() : MySqlConnection {
        if(self::$conn === null) {
            self::$conn = new MySqlConnection();
        }

        return self::$conn;
    }

}

/*
$conn = MySqlConnection::getInstance();
$res =
$conn->query("SELECT * FROM Reservations
WHERE room_id = 1
  AND   from_date <= STR_TO_DATE('07/03/22 11:00:00','%d/%m/%y %H:%i:%s')
  AND   to_date   >= STR_TO_DATE('07/03/22 05:00:00','%d/%m/%y %H:%i:%s');") ->fetchAll();

var_dump($res);
*/
class ReservationService {
    public function __construct() { }

    public function makeRequest(
        string $room_id, string $name, string $surname,
        string $email,   string $from, string $to
    ) : bool {

        $room_nid = intval($room_id);

        // validation placeholder
        if($room_nid < 0 || $room_nid > 8)
            return false;

        if($surname == '' || $name == '' || $email == '')
            return false;

        $conn = MySqlConnection::getInstance();

        $res =
        $conn->query(
            "SELECT * FROM Reservations 
                        WHERE room_id = ".$room_id."
                        AND   from_date <= STR_TO_DATE('".$to."','%d/%m/%y %H:%i:%s')
                        AND   to_date   >= STR_TO_DATE('".$from."','%d/%m/%y %H:%i:%s');
               ")->fetchAll();

        if( count ($res) != 0)
            return false;

        $conn->query(
            "INSERT INTO Reservations (room_id, name, surname, email, from_date, to_date)
                VALUES (
                    '$room_id',
                    '$name',
                    '$surname',
                    '$email',
                    STR_TO_DATE('$from','%d/%m/%y %H:%i:%s'),
                    STR_TO_DATE('$to','%d/%m/%y %H:%i:%s')
                );");

        return true;
    }
}



