<?php
require_once 'autoloading.php';
use System\Database\MysqlConnection;
$conn = MysqlConnection::getInstance();
$result = $conn->query("SELECT * FROM reservations")->fetchAll();
foreach ($result as $row) {
    echo "<tr>
            <td>{$row[0]}</td>
            <td>{$row[1]}</td>
            <td>{$row[2]}</td>
            <td>{$row[3]}</td>
            <td>{$row[4]}</td>
            <td>{$row[5]}</td>
            <td>{$row[6]}</td>
            </tr>";
}
