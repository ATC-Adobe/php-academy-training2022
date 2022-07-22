<body id="form-body">

<p class="room-name">
    Edytujesz rezerwację dla Sali nr <?php
    echo $editReservation['roomNumber'] ?>
</p>

<form action="" method="POST" enctype="multipart/form-data" id="form">

    <input type="hidden" name="reservationId" value="<?php
    echo $id ?>">

    <input type="hidden" name="roomId" value="<?php
    echo $editReservation['id'] ?>">

    <input type="hidden" name="roomNumber" value="<?php
    echo $editReservation['roomNumber'] ?>">

    <input type="hidden" name="userId" value="<?php
    echo $editReservation['userId'] ?>">

    <div class="input-group f-input">
        <span class="input-group-text"> Imię</span>
        <input type="text" name="firstName" aria - label="First name" class="form-control" pattern="[a-zA-Z]{1,}"
               value="<?php
               echo $editReservation['firstName'] ?>" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text"> Nazwisko</span>
        <input type="text" name="lastName" aria - label="Last name" class="form-control" pattern="[a-zA-Z]{1,}"
               value="<?php
               echo $editReservation['lastName'] ?>" required>
    </div>

    <div class="input-group f-input">
        <span class="input-group-text"> Adres E - Mail </span>
        <input type="email" name="email" aria - describedby="emailHelp" class="form-control" value="<?php
        echo $editReservation['email'] ?>" required>
    </div>

    <h4> Sale można rezerwować od Poniedziałku do Piątku </h4>

    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz dzień rozpoczęcia rezerwacji </span>
        <input type="date" name="startDay" min="<?php
        echo date("Y-m-d") ?>" value="<?php
        echo $editReservation['startDay'] ?>" required>
    </div>
    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz dzień zakończenia rezerwacji </span>
        <input type="date" name="endDay" min="<?php
        echo date("Y-m-d") ?>" value="<?php
        echo $editReservation['endDay'] ?>" required>
    </div>

    <h4> Sale można rezerwować od 8:00 do 16:00 </h4>

    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz godzinę rozpoczęcia rezerwacji </span>
        <input type="time" name="startHour" min="08:00" max="15:00" value="<?php
        echo $editReservation['startHour'] ?>" required>
    </div>
    <div class="input-group date-time">
        <span class="input-group-text"> Wybierz godzinę zakończenia rezerwacji </span>
        <input type="time" name="endHour" min="09:00" max="16:00" value="<?php
        echo $editReservation['endHour'] ?>" required>
    </div>

    <button type="submit" class="btn btn-info submit"> Zapisz</button>
</form>
</body>