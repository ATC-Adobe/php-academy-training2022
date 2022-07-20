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

    <script>

        $ = (id) => { return document.getElementById(id) }

        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        function validateEmail() {
            inp = $('emailInput').value;

            if(!inp.match(
                re
            )) {
                $('emailSpan').innerHTML = 'This is not correct email';
            }
            else {
                if(inp === '') {
                    $('emailSpan').innerHTML = '';
                }
                else {
                    $('emailSpan').innerHTML = 'Email is correct';
                }
            }
        }

        function validatePassword1() {
            inp = $('pass1Input').value

            span = $('passSpan');

            if(!inp.match(/[A-Z]/)) {
                span.innerHTML = "Password must contain uppercase letter"
            }
            else if(!inp.match(/[a-z]/)) {
                span.innerHTML = "Password must contain lowercase letter";
            }
            else if(!inp.match(/\d/)) {
                span.innerHTML = "Password must contain digit";
            }
            else if(!inp.match(/[^\w]/)) {
                span.innerHTML = "Password must contain special character";
            }
            else if(inp.length < 8) {
                span.innerHTML = "Password is too short. Must be at least 8 characters long."
            }
            else {
                span.innerHTML = '';
            }
        }

        function validatePassword2() {
            span = $('passSpan');

            pass1 = $('pass1Input').value;
            pass2 = $('pass2Input').value;

            if(span.innerHTML === '') {
                span.innerHTML = (pass1 === '')
                                ? ''
                                : ((pass1 === pass2)
                                    ? 'Password is okay :)'
                                    : 'Passwords arent matching')
            }
        }

        window.addEventListener('load', () => {
            document.getElementById('emailInput')
                .addEventListener('change', validateEmail);

            document.getElementById('pass1Input')
                .addEventListener('change', validatePassword1);

            document.getElementById('pass2Input')
                .addEventListener('change', validatePassword2);

            validateEmail();
            validatePassword1();
            validatePassword2();
        });

    </script>
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
        <form method="post" action="/user/add">

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
                        echo 'value="'.htmlspecialchars($_POST['name']).'"';
                    }
                ?>><br>

                <input type="text" name="surname" <?php
                if(isset($_POST['surname'])) {
                    echo 'value="'.htmlspecialchars($_POST['surname']).'"';
                }
                ?>><br>
                <input type="text" name="email" id="emailInput" <?php
                if(isset($_POST['email'])) {
                    echo 'value="'.htmlspecialchars($_POST['email']).'"';
                }
                ?>><br>

                <span style="error" id="emailSpan"></span><br>

                <input type="text" name="nickname" <?php
                if(isset($_POST['nickname'])) {
                    echo 'value="'.htmlspecialchars($_POST['nickname']).'"';
                }
                ?>><br>
                <br>
                <input type="password" name="password1" id="pass1Input" <?php
                if(isset($_POST['password1'])) {
                    echo 'value="'.htmlspecialchars($_POST['password1']).'"';
                }
                ?> ><br>
                <input type="password" name="password2" id="pass2Input" <?php
                if(isset($_POST['password2'])) {
                    echo 'value="'.htmlspecialchars($_POST['password2']).'"';
                }
                ?> ><br>
                <span style="error" id="passSpan"></span><br>
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