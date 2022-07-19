<?php

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Layout test</title>
    </head>

    <body>
    <div id="page">
        <?php
        if (isset($_SESSION['nickname'])) {
            $nickname = $_SESSION['nickname'];
            echo $menu = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../src/View/reservations.php">Wszystkie rezerwacje</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../src/Form/room_form.php">Dodaj salę</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Cześć, ' . "$nickname" . '!</a></li>
                    <li class="nav-item">
                        <form method="post" action="../Controller/AuthenticationController.php">
                             <input type="hidden" name="authentication" value="logout">
                             <input type="submit" class="nav-item nav-link bg-dark border-0" value="Wyloguj">
                        </form>
                    </li>
                    <?php ?>
                </ul>
            </div>
        </div>
    </nav>';
        } else {
            echo $menu = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../src/View/reservations.php">Wszystkie rezerwacje</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../src/Form/room_form.php">Dodaj salę</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../src/Form/login_form.php">Logowanie</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../src/Form/registration_form.php">Rejestracja</a></li>
                    <?php ?>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>';
        } ?>
    </div>
    </body>
    </html>

<?php
