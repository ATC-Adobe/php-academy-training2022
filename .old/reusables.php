<?php declare(strict_types = 1)
$obj = new helloWorld("Sultan of Swing - Dire Straits");

$obj->elaborate();

$servername = "mysql";
$username = "app";
$password = "qwerty";

try {
    $conn = new PDO("mysql:host=$servername;dbname=app", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



?>

<body></body>
