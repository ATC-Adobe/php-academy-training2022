<!DOCTYPE html>
<html>

<head>

    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">


    <!--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    -->
</head>
<body>

    <div class="header">
        Room reservation service
        <br><br>

    <div class="main">
        <table>
            <tr>
                <th style="width:10%">ID</th>
                <th style="width:40%">Name</th>
                <th style="width:10%">Floor</th>
                <th> </th>
            </tr>
            <tr>&#8203;</tr>
            <?php
                for($i = 1; $i <= 8; $i-=-1) {
                    echo "<tr>";
                    echo "<td> $i </td>";
                    echo "<td> Room $i </td>";
                    $floor = ceil(($i + 1) / 3);
                    echo "<td> $floor </td>";
                    echo "<td><form method='POST' action='order.php'>
                            <input type='hidden' name='id' value='$i'>
                            <input type='submit' value='Reserve'>
                          </form></td>";
                    echo "</tr>";
                }
            ?>
            <tr>&#8203;</tr>
        </table>
    </div>
    </div>
</body>
<?php
?>

</html>

