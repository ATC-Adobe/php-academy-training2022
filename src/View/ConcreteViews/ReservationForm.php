<?php
declare(strict_types = 1);

use \System\Status;
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
        <a href="index.php">Return</a><br>

        <?php
            if(isset($_GET['status'])) {
                echo match(intval($_GET['status'])) {
                    Status::RESERVATION_COLLISION =>
                        '<div class="error">
                            Room is already occupied
                         </div>',
                    Status::RESERVATION_DATE_INVERSION =>
                        '<div class="error">
                            Date inversion
                         </div>',
                    default =>
                        'Unknown status'
                };
            }
        ?>
        <form method='post' action='/add/reservation'>
            <div class="float ltable">
                Room Id:<br>
                <br>
                From: <br>
                To: <br>
                <br>
                Save to:<br>
            </div>
            <div class="float rtable">

                <?php
                $id = 0;

                // we dont want to loose room id information
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                /*elseif(isset($_POST['room_id'])) {
                    $id = $_POST['room_id'];
                }*/
                else {
                    die('Critical error -> no room specified');
                }

                echo '<input type="hidden" name="room_id" value="'.$id.'">';
                echo $id.'<br>';
                ?>
                <br>
                <input type="datetime-local" name="from"><br>
                <input type="datetime-local" name="to"><br>
                <br>


                <input type="radio" name="option" value="db" checked>
                <label for="html">Database</label><br>
                <input type="radio" name="option" value="json">
                <label for="html">JSON</label><br>
                <input type="radio" name="option" value="xml">
                <label for="html">XML</label><br>
                <input type="radio" name="option" value="csv">
                <label for="html">CSV</label><br>


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