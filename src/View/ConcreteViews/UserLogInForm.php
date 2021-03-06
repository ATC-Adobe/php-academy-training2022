<?php
declare(strict_types = 1);
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
    Log In Form
    <br><br>
    <div class="main">
        <form method="post" action="/user/login">

            <?php
                if(isset($_GET['status'])) {
                    echo match(intval($_GET['status'])) {
                        \System\Status::REGISTER_OK => "<div class='success'>
                                    Account created
                                </div>",
                        \System\Status::LOGIN_INVALID => "<div class='error'>
                                    Invalid login or password
                                </div>",
                        default => "unknown error",
                    };

                    echo '<br><br>';
                }
            ?>

            <div class="float ltable">
                E-mail:<br>
                Password: <br>
            </div>
            <div class="float rtable">
                <input type="text" name="username"><br>
                <input type="password" name="password"><br>
                <br>
                <br>
                <input type="submit" value="Log In >">

            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>

<?php include 'layout/footer.html' ?>
</body>
</html>