<?php

$dbServername = "localhost";
$dbUserName = "root";
$dbPassword = "cinthya";

$dbName = "pinkboutique";

$conn = mysqli_connect($dbServername, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

