<?php

require_once "layouts/header.html"; ?>
<body id="form-body">
<?php
require_once "layouts/navbar.html"; ?>

<div id="room-name">
    <?php

    // Printing Room Id from the previous file (index.php)
    $id = $_GET['roomId'];
    echo "Wybrano Salę $id";
    ?>
</div>

<form action="create.php" method="POST" enctype="multipart/form-data" id="form">

    <!--    Transfer Room Id from the form to a MySQL by php echo command-->
    <input type="hidden" name="roomId" value="<?php
    echo $_GET['roomId'] ?>">
    <div class="input-group f-input">
        <span class="input-group-text">Imię</span>
        <input type="text" name="firstName" placeholder="Imię" aria-label="First name" class="form-control"
               pattern="[a-zA-Z]{1,}" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Nazwisko</span>
        <input type="text" name="lastName" placeholder="Nazwisko" aria-label="Last name" class="form-control"
               pattern="[a-zA-Z]{1,}" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text">Adres E-Mail</span>
        <input type="email" name="email" placeholder="Adres E-mail" aria-describedby="emailHelp" class="form-control"
               required>
    </div>

    <div class="input-group">
        <span class="input-group-text">Wybierz dzień rozpoczęcia rezerwacji</span>
        <input type="date" value="<?php
        echo date("Y-m-d") ?>" min="<?php
        echo date("Y-m-d") ?>" name="startDay">
        <span class="input-group-text">Wybierz dzień zakończenia rezerwacji</span>
        <input type="date" value="<?php
        echo date("Y-m-d") ?>" min="<?php
        echo date("Y-m-d") ?>" name="endDay">
    </div>

    <h4>Sale można rezerwować od Poniedziałku do Piątku</h4>

    <div class="input-group">
        <span class="input-group-text">Wybierz godzinę rozpoczęcia rezerwacji</span>
        <input type="time" name="startHour" min="08:00" max="15:00" required>
        <span class="input-group-text">Wybierz godzinę zakończenia rezerwacji</span>
        <input type="time" name="endHour" min="09:00" max="16:00" required>
    </div>

    <h4>Sale można rezerwować od 8:00 do 16:00</h4>

    <button type="submit" class="btn btn-info submit">Zapisz</button>
</form>
<?php
require_once "layouts/footer.html" ?>
</body>
</html>