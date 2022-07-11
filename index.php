<?php
//class Singleton
//{
//    private static $instance;
//
//    private function __construct()
//    {
//    }
//
//    private function __clone()
//    {
//    }
//
//    public static function getInstance()
//    {
//        if (self::$instance === null) {
//            self::$instance = new Singleton();
//        }
//        return self::$instance;
//    }
//
//    public function getString()
//    {
//        echo "singleton";
//    }
//}
//
//Singleton::getInstance()->getString();
//
//
//?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Rooms</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="reservationsList.php">Reservations List</a>
        </li>

    </ul>

</nav>
<div class="container">
<table class="table table-sm table-striped table-dark">
    <tr>
        <th>room_id</th>
        <th>name</th>
        <th>floor</th>
        <th></th>
    </tr>
<?php
//xml
/*
 if (file_exists('rooms.xml')) {
    $rooms = simplexml_load_file('rooms.xml');
foreach ($rooms->room as $room) {
    echo "<tr><td>$room->room_id</td>
<td>$room->name</td>
<td>$room->value</td>
<td><form method='get' action='reservations.php'><input type='hidden' name='room' value=$room->name /><input type='submit' value='Zarezerwuj'></form> </td>
</tr>";
   // print_r(rooms);
} }else {
    exit('Failed to open rooms.xml.');
}
 */

//json
$json = file_get_contents('rooms.json');

// Decode the JSON file
$json_data = json_decode($json,true);


foreach ($json_data as $room) {
    echo "<tr><td>$room[room_id]</td>
<td>$room[name]</td>
<td>$room[floor]</td>
<td><form method='get' action='reservations.php'><input type='hidden' name='room' value=$room[name] /><input type='submit' value='Zarezerwuj'></form> </td>
</tr>";
   // print_r(rooms);
}


?>


</table>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>