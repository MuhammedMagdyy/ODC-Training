<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "data";
$connect = mysqli_connect($host, $user, $password, $database);
if (!$connect) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
