<?php
// Enable full error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
session_start();
require_once 'Models/Database.php';
$database = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, PORT);
$connection = $database->connect();
require_once 'model.php';
require_once 'router.php';

$database->disconnect();

