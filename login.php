<?php
    declare(strict_types = 1);
    require_once "./autoloading.php";
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Login</title>

        <?php
        include_once "./src/Layout/head.html";
        ?>

    </head>
    <body>

    <div id="main">

        <?php

        include_once "./src/Layout/navbar.html";
        include_once "./src/View/loginForm.php";

        ?>

        <div id="footer">
            <p>&copy; Norbert Grudzień - 2022</p>
        </div>

    </div>


    </body>
    </html>