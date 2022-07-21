<?php

declare(strict_types = 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/layout/css/style.css">

    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body
<?php
    $sess = \System\Util\Session::getInstance();
    $style = intval($sess->get('style'));

    if($style !== 0) {
        echo ' class="palette'.$style.'"';
    }
?>
>

<?php
include "layout/menur.php";
?>

<div class="header">
    Your Profile
    <br><br>
    <div class="main">

        <div class="float ltable">
            ID:<br>
            <br>
            Name:<br>
            Surname:<br>
            Email:<br>
            <br>
            Nickname:<br>
            <br>
            Page Style:<br>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="float rtable">
            <?php
                $sess = \System\Util\Session::getInstance();

                echo $sess->get('id').'<br>';
                echo '<br>';
                echo $sess->get('name').'<br>';
                echo $sess->get('surname').'<br>';
                echo $sess->get('email').'<br>';
                echo '<br>';
                echo $sess->get('username').'<br>';
                echo '<br>';
            ?>
            <form method="post" action="/user/style">
                <input type="radio" name="option" value="default" checked>
                <label for="html">Default</label><br>
                <input type="radio" name="option" value="style1">
                <label for="html">Style 1</label><br>
                <input type="radio" name="option" value="style2">
                <label for="html">Style 2</label><br>
                <input type="radio" name="option" value="style3">
                <label for="html">Style 3</label><br>
                <br>
                <input type="submit" value="Submit">
            </form>

        </div>
        <div class="clear"></div>

    </div>
</div>

<?php include 'layout/footer.html' ?>
</body>
</html>

