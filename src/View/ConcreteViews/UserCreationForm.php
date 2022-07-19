<?php
declare(strict_types = 1);

use System\Status;
use \System\Util\Authenticator;

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
    Account Registration Form
    <br><br>
    <div class="main">

        <?php
            if(isset($_POST['status'])) {
                echo '<div class="error">';

                echo match(intval($_POST['status'])) {
                    Status::REGISTER_FIELD_EMPTY =>
                    "Some input field are empty!",
                    Status::REGISTER_PASSWORD_TOO_WEAK =>
                    "Password is too weak!",
                    Status::REGISTER_PASSWORD_NOT_MATCH =>
                    "Passwords don't match!",
                    Status::REGISTER_USERNAME_OR_EMAIL_TAKEN =>
                    "An account with given username or email is already in use",
                    Status::REGISTER_EMAIL_INVALID =>
                    "Invalid email",
                    default => "unknown status",
                };

                echo ' </div><br><br>';
            }
        ?>
        <form method="post" action="/add/user">

            <div class="float ltable">
                Name:<br>
                Surname:<br>
                E-mail:<br>
                <br>
                Nickname: <br>
                <br>
                Password: <br>
                Repeat password: <br>
            </div>
            <div class="float rtable">
                <input type="text" name="name" <?php
                    if(isset($_POST['name'])) {
                        echo 'value="'.$_POST['name'].'"';
                    }
                ?>><br>

                <input type="text" name="surname" <?php
                if(isset($_POST['surname'])) {
                    echo 'value="'.$_POST['surname'].'"';
                }
                ?>><br>
                <input type="text" name="email" <?php
                if(isset($_POST['email'])) {
                    echo 'value="'.$_POST['email'].'"';
                }
                ?>><br>

                <br>
                <input type="text" name="nickname" <?php
                if(isset($_POST['nickname'])) {
                    echo 'value="'.$_POST['nickname'].'"';
                }
                ?>><br>
                <br>
                <input type="password" name="password1"<?php
                if(isset($_POST['password1'])) {
                    echo 'value="'.$_POST['password1'].'"';
                }
                ?>><br>
                <input type="password" name="password2"<?php
                if(isset($_POST['password2'])) {
                    echo 'value="'.$_POST['password2'].'"';
                }
                ?>><br>
                <br>
                <br>
                <input type="submit" value="Create Account >">

            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>

<?php include 'layout/footer.html' ?>
</body>
</html>