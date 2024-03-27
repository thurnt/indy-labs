<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$dbServer = $_ENV['DB_SERVER'];
$dbUsername = $_ENV['DB_USERNAME'];
$dbPass = $_ENV['DB_PASSWORD'];
$dbName = $_ENV['DB_NAME'];

try {
    /* Attempt to connect to MySQL database */
    $db = mysqli_connect($dbServer, $dbUsername, $dbPass, $dbName);
    if ($db === false) {
        header("Location: " . APP_PATH . "/error");
        exit();
    }
} catch (Throwable $th) {
    if ($_GET['url'] != "error") {
        header("Location: " . APP_PATH . "/error");
        exit();
    }
}
