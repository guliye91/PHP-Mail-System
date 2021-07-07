<?php


$serverName = 'localhost';
$username = "root";
$password = "";
$dbName = "mailsystem";

$conn = mysqli_connect($serverName, $username, $password, $dbName);
if (!$conn) {
    die('Connection Failed!' . mysqli_connect_error());
}
