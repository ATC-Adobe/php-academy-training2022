<?php

include("autoloading.php");
include("layout/navbar.html");
include("layout/bootstrap.html");


echo '
<body>
<table class="table table-bordered table-dark">
    <thead>
    <tr>
        <th scope="col">room_id</th>
        <th scope="col">name</th>
        <th scope="col">floor</th>
        <th scope="col">zarezerwuj</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Room_1</td>
        <td>1</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="1"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Room_2</td>
        <td>1</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="2"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Room_3</td>
        <td>2</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="3"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>4</td>
        <td>Room_4</td>
        <td>2</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="4"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>5</td>
        <td>Room_5</td>
        <td>2</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="5"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>6</td>
        <td>Room_6</td>
        <td>3</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="6"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>7</td>
        <td>Room_7</td>
        <td>3</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="7"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    <tr>
        <td>8</td>
        <td>Room_8</td>
        <td>3</td>
        <td><form method="get" action="../src/Form/formularz.php"><input type="hidden" name="room_id" value="8"/><input type="submit" value="zarezerwuj" class="btn btn-outline-success"></form></td>
    </tr>
    </tbody>
</table>
</body>
</html>';