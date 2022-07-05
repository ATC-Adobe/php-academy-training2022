<!DOCTYPE html>
<html>

<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body>

<?php

$resv = [
1, 5, 'Sierra', 'Ray', 'facilisis@risusDonec.com', '07/03/22 09:00:00', '07/03/22 10:00:00',
2, 2, 'Risa', 'Whitaker', 'orci.adipiscing.non@Morbisitamet.edu', '20/08/22 07:30:00', '20/08/22 08:30:00',
3, 6, 'Sopoline', 'Chang', 'eget.odio.Aliquam@FuscemollisDuis.edu', '22/01/24 12:30:00', '22/01/24 13:45:00',
4, 5, 'Beck', 'Herman', 'metus@Nuncpulvinararcu.com', '03/01/23 11:40:00', '03/01/23 13:30:00',
5, 6, 'Rhiannon', 'Fletcher', 'id@porttitorscelerisque.com', '03/11/23 10:15:00', '03/11/23 15:15:00',
6, 2, 'Georgia', 'Casey', 'dictum.cursus@placerateget.ca', '28/02/22 10:00:00', '28/02/22 10:55:00',
7, 3, 'Vladimir', 'Mcmillan', 'fringilla.mi@porttitortellusnon.com', '14/09/23 08:15:00', '14/09/23 18:15:00',
8, 8, 'Zachary', 'Gaines', 'aliquam.iaculis@tinciduntnibh.org', '30/11/22 09:15:00', '30/11/22 11:30:00',
9, 2, 'Cassandra', 'May', 'ipsum.cursus@magnamalesuadavel.ca', '14/09/22 10:25:00', '14/09/22 10:45:00',
10, 3, 'Aimee', 'Hendricks', 'scelerisque.lorem@Proin.ca', '02/06/23 10:30:00', '02/06/23 16:00:00',
];



?>

<div class="header">
    Room reservation service
    <br><br>
    <div class="main">
        <span style="font-size: 1.5em">Active reservations:</span> <br><br><br><br>

        <?php

        for($i = 0; $i < count($resv);) {
            $id =       $resv[$i++];
            $room =     $resv[$i++];
            $name =     $resv[$i++];
            $surname =  $resv[$i++];
            $email =    $resv[$i++];
            $from =     $resv[$i++];
            $to =       $resv[$i++];


            echo "<div class='row'>
                <div class='float ltable' style = 'line-height: 1.2em;' >
                    Reservation ID: <br>
                    Room ID: <br >
                    Name: <br >
                    E - mail: <br >
                    Time span: <br >
                </div >
                <div class='float rtable' style = 'line-height: 1.2em;' >
                    $id <br>
                    $room <br>
                    $name $surname <br>
                    $email <br>
                    $from - $to <br>
                </div >
                <div class='clear' ></div >
                </div>";
        }
        ?>

    </div>
</div>
</body>
</html>

