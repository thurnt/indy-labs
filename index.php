<?php
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("__ROOT__", dirname(__FILE__));
require_once("./config/bootstrap.php");
