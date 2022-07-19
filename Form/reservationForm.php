<?php

?>

<body id="form-body">

<form action="" method="POST" enctype="multipart/form-data" id="form">

    <input type="hidden" name="roomId" value="<?php
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        echo $id = $_GET['roomId'] ?? null;
    } ?>">

    <input type="hidden" name="roomNumber" value="<?php
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        echo $roomNumber = $_GET['roomNumber'] ?? null;
    } ?>">

    <input type="hidden" name="userId" value="<?php
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        echo $userId = $_GET['userId'] ?? null;
    } ?>">

    <div class="input-group f-input">
        <span class="input-group-text"> Imię</span>
        <input type="text" name="firstName" aria - label="First name" class="form-control" pattern="[a-zA-Z]{1,}"
               required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text"> Nazwisko</span>
        <input type="text" name="lastName" aria - label="Last name" class="form-control" pattern="[a-zA-Z]{1,}"
               required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text"> Adres E - Mail </span>
        <input type="email" name="email" aria - describedby="emailHelp" class="form-control" required>
    </div>

    <h4> Sale można rezerwować od Poniedziałku do Piątku </h4>

    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz dzień rozpoczęcia rezerwacji </span>
        <input type="date" name="startDay" min="<?php
        echo date("Y-m-d") ?>" value="<?php
        echo date("Y-m-d") ?>" required>
    </div>
    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz dzień zakończenia rezerwacji </span>
        <input type="date" name="endDay" min="<?php
        echo date("Y-m-d") ?>" value="<?php
        echo date("Y-m-d") ?>" required>
    </div>

    <h4> Sale można rezerwować od 8:00 do 16:00 </h4>

    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz godzinę rozpoczęcia rezerwacji </span>
        <input type="time" name="startHour" min="08:00" max="15:00" required>
    </div>
    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz godzinę zakończenia rezerwacji </span>
        <input type="time" name="endHour" min="09:00" max="16:00" required>
    </div>

    <div class="input-group " id="file-type">
        <span class="input-group-text"> Wybierz miejsce zapisu danych </span>
        <select class="form-control" name="dataType">
            <option value="database">
                Baza Danych
            </option>
            <option value="csv">
                Plik CSV
            </option>
            <option value="xml">
                Plik XML
            </option>
            <option value="json">
                Plik JSON
            </option>
        </select>
    </div>

    <button type="submit" class="btn btn-info submit"> Zapisz</button>
</form>
</body>