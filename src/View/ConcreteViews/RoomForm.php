<?php
declare(strict_types = 1);

if(isset($_POST['room_name'])) {
    $serv = new \Controller\AddRoomController();
    $serv->makeRequest();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/layout/css/style.css">

    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body>

<?php
    include "layout/menur.php";
?>

<div class="header">
    Room reservation service
    <br><br>
    <div class="main">
        <?php
            echo "<form method='post' action='/add/room'>";
        ?>

            <div class="float ltable">
                Room name:<br>
                Floor:<br>
            </div>
            <div class="float rtable">
                <input type="text" name="room_name" ><br>
                <input type="text" name="floor" > <br>
            </div>
            <div class="clear"></div>
            <br><br>
            <input type="submit" value="Submit Request >">
        </form>
    </div>
</div>

<?php include 'layout/footer.html' ?>
</body>
</html>