<?php
//require_once 'autoloading.php';
//use System\Database\Connection;
//include 'System/Database/Connection.php';
//if(isset($_POST['CSV'])) {
//    $myFile = new SplFileObject('reservation.csv', "a");
//    $myFile->fputcsv($_POST);
//
//}
//if(isset($_POST['JSON'])) {
//
//    file_put_contents('reservation.json', json_encode($_POST));
//}
//if(isset($_POST['XML'])) {
//    echo "This is Button2 that is selected";
//}
//?>
<?php
//class ReservationService {
//    public $name;
//    public $surname;
//    public $email;
//    public $datetimeFrom;
//    public $datetimeTo;
//    private $formFields;
//
//    function __construct($requestArray)
//    {
//        $this->formFields=$requestArray;
//
//    }
//    public function saveData($fname){
//        $myFile = new SplFileObject($fname, "a");
//        $myFile->fputcsv($this->formFields);
//        $myFile = null;
//    }
//
//    public function readData(){
//        $file = fopen('file.csv', 'r');
//        $i=1;
//        while (($line = fgetcsv($file)) !== FALSE) {
//            //$line is an array of the csv elements
//            //$value = implode(' ',$line);
//            //print_r("<p>$value</p>");
//            $from = date('d/m/y H:i:s',strtotime($line[4]));
//            $to = date('d/m/y H:i:s',strtotime($line[5]));
//
//         echo "<tr>
//            <td>$i</td>
//            <td>$line[0]</td>
//            <td>$line[1]</td>
//            <td>$line[2]</td>
//            <td>$line[3]</td>
//            <td>$from</td>
//            <td>$to</td>
//</tr>";
//         $i++;
//        }
//        fclose($file);
//
//    }
//
//}
//
//$myReservation = new ReservationService($_POST);
//$myReservation->saveData("file.csv");
//
//
//
//?>
<?php
require_once 'autoloading.php';
include_once 'Controller/Logout.php';
include_once 'layout/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Reservations List</title>
</head>
<body>

<div class="container">
    <table class="table table-striped table-dark">
        <tr>
            <th>reservation_id</th>
            <th>room_id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>room_name</th>
            <th></th>
        </tr>

        <tr>
            <td>1</td>
            <td>5</td>
            <td>Sierra</td>
            <td>Ray</td>
            <td>facilisis@risusDonec.com</td>
            <td>07/03/22 09:00:00</td>
            <td>07/03/22 10:00:00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>2</td>
            <td>Risa</td>
            <td>Whitaker</td>
            <td>orci.adipiscing.non@Morbisitamet.edu</td>
            <td>20/08/22 07:30:00</td>
            <td>20/08/22 08:30:00</td>
        </tr>
        <tr>
            <td>3</td>
            <td>6</td>
            <td>Sopoline</td>
            <td>Chang</td>
            <td>eget.odio.Aliquam@FuscemollisDuis.edu</td>
            <td>22/01/24 12:30:00</td>
            <td>22/01/24 13:45:00</td>
        </tr>
        <tr>
            <td>4</td>
            <td>5</td>
            <td>Beck</td>
            <td>Herman</td>
            <td>metus@Nuncpulvinararcu.comu</td>
            <td>03/01/23 11:40:00</td>
            <td>03/01/23 13:30:00</td>
        </tr>
        <tr>
            <td>5</td>
            <td>6</td>
            <td>Rhiannon</td>
            <td>Fletcher</td>
            <td>id@porttitorscelerisque.com</td>
            <td>03/11/23 10:15:00</td>
            <td>03/11/23 15:15:00</td>
        </tr>
        <tr>
            <td>6</td>
            <td>2</td>
            <td>Georgia</td>
            <td>Casey</td>
            <td>idictum.cursus@placerateget.ca</td>
            <td>28/02/22 10:00:00</td>
            <td>28/02/22 10:55:00</td>
        </tr>
        <tr>
            <td>7</td>
            <td>3</td>
            <td>Vladimir</td>
            <td>Mcmillan</td>
            <td>fringilla.mi@porttitortellusnon.com</td>
            <td>14/09/23 08:15:00</td>
            <td>14/09/23 18:15:00</td>
        </tr>
        <tr>
            <td>8</td>
            <td>8</td>
            <td>Zachary</td>
            <td>Gaines</td>
            <td>aliquam.iaculis@tinciduntnibh.org</td>
            <td>30/11/22 09:15:00</td>
            <td>30/11/22 11:30:00</td>
        </tr>
        <tr>
            <td>9</td>
            <td>2</td>
            <td>Cassandra</td>
            <td>May</td>
            <td>ipsum.cursus@magnamalesuadavel.ca</td>
            <td>14/09/22 10:25:00</td>
            <td>14/09/22 10:45:00</td>
        </tr>
        <tr>
            <td>10</td>
            <td>3</td>
            <td>Aimee</td>
            <td>Hendricks</td>
            <td>scelerisque.lorem@Proin.ca</td>
            <td>02/06/23 10:30:00</td>
            <td>02/06/23 16:00:00</td>
        </tr>
        <?php
        require_once 'autoloading.php';
        use System\Database\Connection;
        use src\Reservation\Model\ReservationModel;
        use src\Reservation\Repository\ReservationRepository;
        use src\Reservation\Service\ReservationService;
        use src\Reservation\Service\AddToJSON;

        use src\Reservation\Service\AddToCSV;
        include_once "System/Database/Connection.php";
        include_once 'src/Reservation/Model/ReservationModel.php';
        include_once 'src/Reservation/Repository/ReservationRepository.php';
        include_once 'src/Reservation/Service/ReservationService.php';
        include_once 'src/Reservation/Service/AddToCSV.php';
        include_once 'src/Reservation/Service/AddToJSON.php';





        if(isset($_POST['CSV'])) {
            $reservation = new ReservationService($_POST['roomNumber'], $_POST['name'], $_POST['surname'],
                $_POST['email'], $_POST['datetimeFrom'], $_POST['datetimeTo']);
            $data = ReservationService::createReservation($reservation);

//            $myFile = new SplFileObject('reservation.csv', "a");
//            $myFile->fputcsv($data);
//            $reservation = new \src\Reservation\Service\AddToCSV($_POST['roomNumber'], $_POST['name'], $_POST['surname'],
//                $_POST['email'], $_POST['datetimeFrom'], $_POST['datetimeTo']);


            src\Reservation\Service\AddToCSV::saveFile($data);


        }
        if(isset($_POST['JSON'])) {
//            $reservation = new ReservationService($_POST['roomNumber'], $_POST['name'], $_POST['surname'],
//                $_POST['email'], $_POST['datetimeFrom'], $_POST['datetimeTo']);
//            $data = ReservationService::createReservation($reservation);

//            $data=[$_POST['roomNumber'],$_POST['name'],$_POST['surname'],$_POST['email'],
//                $_POST['datetimeFrom'], $_POST['datetimeTo']];

            $newReservation = [
                'roomNumber'  => $_POST['roomNumber'],
                'name'  => $_POST['name'],
                'surname' => $_POST['surname'],
                'email'  => $_POST['email'],
                'datetimeFrom'  => $_POST['datetimeFrom'],
                'datetimeTo'  => $_POST['datetimeTo']
            ];
            $json = file_get_contents('reservation.json');
            if($json){
                $jsonData = json_decode($json);
            }
            else{
                $jsonData = [];
            }
            $jsonData[] = $newReservation;

            $json2 = json_encode($jsonData);
            file_put_contents('reservation.json', $json2);


//            src\Reservation\Service\AddToJSON::saveFile(json_encode($reservation));


        }
        if(isset($_POST['XML'])) {
            $newReservation = [
                'roomNumber'  => $_POST['roomNumber'],
                'name'  => $_POST['name'],
                'surname' => $_POST['surname'],
                'email'  => $_POST['email'],
                'datetimeFrom'  => $_POST['datetimeFrom'],
                'datetimeTo'  => $_POST['datetimeTo']
            ];
            function arrayToXml($array, $rootElement = null, $xml = null) {
                $_xml = $xml;

                // If there is no Root Element then insert root
                if ($_xml === null) {
                    $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
                }

                // Visit all key value pair
                foreach ($array as $k => $v) {

                    // If there is nested array then
                    if (is_array($v)) {

                        // Call function for nested array
                        arrayToXml($v, $k, $_xml->addChild($k));
                    }

                    else {

                        // Simply add child element.
                        $_xml->addChild($k, $v);
                    }
                }

                return $_xml->asXML();
            }

            $xml = file_get_contents('reservation.xml');
            if($xml){
                $xmlData = simplexml_load_string($xml);
            }
            else{
                $xmlData = [];
            }
            $xmlData[] = $newReservation;
            $xml = arrayToXml($xmlData);


            file_put_contents('reservation.xml', $xml);






        }
        if(isset($_SESSION['nickname'])) {
        if(isset($_POST['DB'])) {

            if (!empty($_POST['datetimeFrom']) && !empty($_POST['datetimeTo']) && !empty($_POST['roomNumber'])) {

                $roomNumber = $_POST['roomNumber'];
                $result = src\Reservation\Repository\ReservationRepository::isReserved($roomNumber)->fetch(PDO::FETCH_ASSOC);
                if(!empty($result)){
                    if(($result['start_date']<=$_POST['datetimeFrom'] && $result['end_date']>=$_POST['datetimeFrom'])|| ($result['start_date']<=$_POST['datetimeTo'] && $result['end_date']>=$_POST['datetimeTo'])){
                        echo "Room is reserved, please choose another room";
                    }
                elseif($_POST['datetimeTo']>$_POST['datetimeFrom']) {

                    $item = new ReservationRepository(
                        $_POST['roomNumber'],
                        $_SESSION['userID'],
                        date("d/m/y H:i:s", strtotime($_POST['datetimeFrom'])),
                        date("d/m/y H:i:s", strtotime($_POST['datetimeTo']))

                    );

                    $item->saveReservation();
                }
                else
                {
                    echo 'Invalid date and time';
                }

            }elseif($_POST['datetimeTo']>$_POST['datetimeFrom']) {

                    $item = new ReservationRepository(
                        $_POST['roomNumber'],
                        $_SESSION['userID'],
                        date("d/m/y H:i:s", strtotime($_POST['datetimeFrom'])),
                        date("d/m/y H:i:s", strtotime($_POST['datetimeTo']))

                    );

                    $item->saveReservation();
                }
                else
                {
                    echo 'Invalid date and time';
                }

            }
        }}
        else echo "You must login first";

        ?>

        <?php
        require_once 'autoloading.php';
        include 'View/ReservationView.php';
        ?>

    </table>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>