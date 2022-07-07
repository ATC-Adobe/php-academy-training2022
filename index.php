<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Rooms</title>
</head>
<body>
<div class="container">
<table class="table table-sm table-striped table-dark">
    <tr>
        <th>room_id</th>
        <th>name</th>
        <th>floor</th>
        <th></th>
    </tr>

    <tr>
        <td>1</td>
        <td>Room_1</td>
        <td>1</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_1" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Room_2</td>
        <td>1</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_2" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Room_3</td>
        <td>2</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_3" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>4</td>
        <td>Room_4</td>
        <td>2 </td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_4" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>5</td>
        <td>Room_5</td>
        <td>2</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_5" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>6</td>
        <td>Room_6</td>
        <td>3</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_6" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>7</td>
        <td>Room_7</td>
        <td>3</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_7" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>
    <tr>
        <td>8</td>
        <td>Room_8</td>
        <td>3</td>
        <td><form method="get" action="reservations.php"><input type="hidden" name="room" value="Room_8" /><input type="submit" value="Zarezerwuj"></form></td>
    </tr>


</table>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>