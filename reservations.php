<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Reservation Form</title>
</head>
<body>
<div class="container">
<form class="bg-dark text-light" method="post" action="reservationsList.php">
    <h2><?php echo $_GET["room"] ?></h2>
    <label for="name">Imię:</label>
    <input type="text" id="name"  name="name"><br>
    <label for="surname">Nazwisko:</label>
    <input type="text" id="surname"  name="surname"><br>
    <label for="email">Adres e-mail:</label>
    <input type="text" id="email"  name="email"><br>
    <label for="datetimeFrom">Data i godzina rozpoczęcia rezerwacji:</label>
    <input type="datetime-local" id="datetimeFrom" name="datetimeFrom"><br>
    <label for="datetimeTo">Data i godzina zakończenia rezerwacji:</label>
    <input type="datetime-local" id="datetimeTo" name="datetimeTo"><br>
    <input type="submit" value="Zapisz">
</form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>