<?php

require_once "layouts/header.html"; ?>
<body class="index-list-body">
<?php
require_once "layouts/navbar.html"; ?>

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
            <input type="hidden" name="roomId" value="1">
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
            <input type="hidden" name="roomId" value="2">
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
            <input type="hidden" name="roomId" value="3">
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
            <input type="hidden" name="roomId" value="4">
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
            <input type="hidden" name="roomId" value="5">
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
            <input type="hidden" name="roomId" value="6">
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
            <input type="hidden" name="roomId" value="7">
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
            <input type="hidden" name="roomId" value="8">
            <td>
                <button type="submit" class="btn check">Zarezerwuj</button>
            </td>
        </tr>
    </form>
    </tbody>
</table>
</form>
<?php
require_once "layouts/footer.html" ?>
</body>
</html>