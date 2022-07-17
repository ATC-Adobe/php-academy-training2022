<?php

namespace Repository;

use Database\Connection;
use SplFileObject;
use SimpleXMLElement;

interface SaveToInterface
{
    public function saveTo($id);
}

class SaveToDB implements SaveToInterface
{
    public function saveTo($id)
    {
        require_once '../../autoloading.php';
        $dbConnection = Connection::getInstance();
        $roomId = $_POST['room_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $insertQuery = "
    INSERT INTO reservation (room_id, firstname, lastname, email, start_date, end_date)
    VALUES (
            '$roomId',
            '$firstname',
            '$lastname',
            '$email',
            '$startDate',
            '$endDate'
            );
";
        $dbConnection->query($insertQuery);
        header('Location: http://localwsl.com/src/View/reservations.php');
    }


}

class SaveToCsv implements SaveToInterface
{
    public function saveTo($id)
    {
        $file = new SplFileObject("../Database/reservations.csv", 'r');
        $reservationsCsv = [];
        while (!$file->eof()) {
            $reservationsCsv[] = $file->fgetcsv();
        }
        $list = [
            [11, $_POST['room_id'], $_POST['firstname'],
                $_POST['lastname'], $_POST['email'],
                $_POST['start_date'], $_POST['end_date']
            ]];
        $reservationsCsv = array_merge($reservationsCsv, $list);
        $file = fopen("../Database/reservations.csv", 'w');
        foreach ($reservationsCsv as $reservation) {
            fputcsv($file, $reservation, ',');
        }
        fclose($file);
        header('Location: http://localwsl.com/src/View/reservations.php');
    }

}

class SaveToJson implements SaveToInterface
{
    public function saveTo($id)
    {
        $list = [
            ["reservation_id" => 11, "room_id" => $_POST['room_id'],
                "firstname" => $_POST['firstname'], "lastname" => $_POST['lastname'],
                "email" => $_POST['email'], "start_date" => $_POST['start_date'],
                "end_date" => $_POST['end_date']]
        ];
        $reservationsJson = file_get_contents("../Database/reservations.json");
        $reservationsJson = json_decode($reservationsJson, true);
        $reservationsJson = array_merge($reservationsJson, $list);
        $reservationsJson = json_encode($reservationsJson);
        file_put_contents("../Database/reservations.json", $reservationsJson);

        header('Location: http://localwsl.com/src/View/reservations.php');
        // TODO: Implement saveTo() method.
    }
}

class SaveToXml implements SaveToInterface
{
    public function saveTo($id)
    {
        $xmlFile = "../Database/reservations.xml";
        $xml = simplexml_load_file($xmlFile);
        $reservations = $xml->reservations;
        $reservation = $reservations->addChild('reservation');
        $reservation->addChild('reservationid', '11');
        $reservation->addChild('roomid', '11');
        $reservation->addChild('firstname', '11');
        $reservation->addChild('lastname', '11');
        $reservation->addChild('email', '11');
        $reservation->addChild('startdate', '11');
        $reservation->addChild('enddate', '11');
        $xml->asXML($xmlFile);
        // TODO: Implement saveTo() method.
    }
}

class ReservationService
{
    private string $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getReservationId()
    {
        return $this->id;
    }

    public function createReservation()
    {
        if (count($_POST) > 0) {
            $roomId = $_POST['room_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
        }

        return $email;
    }
}

class ReservationFactory
{
    public function save($id)
    {
        switch ($id) {
            case 'Zapisz w bazie danych':
                $save = new SaveToDB();
                $save->saveTo($id);
                break;
            case 'Zapisz w pliku CSV':
                $save = new SaveToCsv();
                $save->saveTo($id);
                break;
            case 'Zapisz w pliku JSON':
                $save = new SaveToJson();
                $save->saveTo($id);
                break;
            case 'Zapisz w pliku XML':
                $save = new SaveToXml();
                $save->saveTo($id);
                break;
            default:
                throw new RuntimeException('Unknown saving type');
        }
        return $save;
        //return new ReservationService($id);
    }

}

$id = $_POST['save_id'];
$reservationServ = new ReservationService($id);
$email = $reservationServ->createReservation();
$reservId = $reservationServ->getReservationId();
$reservationFactory = new ReservationFactory();
$reservFac = $reservationFactory->save($id);

var_dump($reservationServ);

echo '<hr>' . $reservId . '<hr>';

var_dump($reservFac);

echo '<hr>' . $email . '<hr>';