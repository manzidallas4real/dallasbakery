<?php
// Error Reporting Turn On
error_reporting(E_ALL);


$dbhost = 'localhost';
$dbname = 'dallasbakery';
$dbuser = 'root';
$dbpass = '';

// Defining base url
define("BASE_URL", "");

// Getting Admin url
define("ADMIN_URL", BASE_URL . "admin" . "/");

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
