<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
const DB_SERVER = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'indy-lab';

try {
    /* Attempt to connect to MySQL database */
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($db === false) {
        header("Location: " . APP_PATH . "/offline");
        exit();
    }
} catch (Throwable $th) {
    if ($_GET['url'] != "offline") {
        header("Location: " . APP_PATH . "/offline");
        exit();
    }
}
