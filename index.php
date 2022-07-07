<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>Sale Konferencyjne</title>
</head>
<body>

<table class="table">
    <thead id="reservation-head">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Numer Sali</th>
        <th scope="col">Piętro</th>
        <th scope="col">Możliwa Akcja</th>
    </tr>
    </thead>
    <tbody id="reservation-list">

<!--    Each Room has to be a seperate form, because of method GET and obligation to transfer Room Id value to the next file-->
    <form action="form.php" method="get">
        <tr>
            <th scope="row">1</th>
            <td class="table-td">Sala 1</td>
            <td class="table-td">Piętro 1</td>
            <input type="hidden" name="room_id" value="1">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">2</th>
            <td class="table-td">Sala 2</td>
            <td class="table-td">Piętro 1</td>
            <input type="hidden" name="room_id" value="2">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">3</th>
            <td class="table-td">Sala 3</td>
            <td class="table-td">Piętro 2</td>
            <input type="hidden" name="room_id" value="3">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">4</th>
            <td class="table-td">Sala 4</td>
            <td class="table-td">Piętro 2</td>
            <input type="hidden" name="room_id" value="4">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">5</th>
            <td class="table-td">Sala 5</td>
            <td class="table-td">Piętro 2</td>
            <input type="hidden" name="room_id" value="5">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">6</th>
            <td class="table-td">Sala 6</td>
            <td class="table-td">Piętro 3</td>
            <input type="hidden" name="room_id" value="6">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">7</th>
            <td class="table-td">Sala 7</td>
            <td class="table-td">Piętro 3</td>
            <input type="hidden" name="room_id" value="7">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    <form action="form.php" method="get">
        <tr>
            <th scope="row">8</th>
            <td class="table-td">Sala 8</td>
            <td class="table-td">Piętro 3</td>
            <input type="hidden" name="room_id" value="8">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    </tbody>
</table>
</form>
</body>
</html>