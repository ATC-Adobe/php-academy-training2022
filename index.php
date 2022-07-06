<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All conference rooms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
</head>
<body class="background">
    <div class="container mt-2 ">
    <h2 class="text-center">Avaible rooms: </h2>
    <table>
        <tr>
            <th><p>id</p></th>
            <th><p>name</p></th>
            <th class="w-25"><p>floor</p></th>
        </tr>
        <?php
            include_once "./RoomService.php";
            $rooms = (new RoomService())->readRooms();

            foreach ($rooms as $i => $room) {
                echo '<tr>';
                echo "<td><p>{$room['id']}</p></td>";
                echo "<td><p>{$room['name']}</p></td>";
                echo "<td class=\"floor\"><p>{$room['floor']}</p> <a href=\"/reserveForm.php?name={$room['name']}&id={$room['id']}\"><button class=\"btn btn-primary px-3\">Reserve</button> </a> </td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>