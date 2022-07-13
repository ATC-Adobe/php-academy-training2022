
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


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Reservations List</title>
</head>
<body>
<?php
require_once "layout/navbar.html";
?>
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
        include_once 'autoloading.php';
        include 'Reservation/Model/ReservationModel.php';
        include 'Reservation/Repository/ReservationRepository.php';
        use System\Database\MysqlConnection;
        use Reservation\Repository\ReservationRepository;
        $item = new Reservation\Repository\ReservationRepository($_POST['roomNumber'], $_POST['name'], $_POST['surname'],
            $_POST['email'], date("d/m/y H:i:s",strtotime($_POST['datetimeFrom'])), date("d/m/y H:i:s",strtotime($_POST['datetimeTo'])));
        $item->saveReservation();
        include_once "System/Database/MysqlConnection.php";
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