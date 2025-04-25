<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbsname = "quiz_app";

$conn = new mysqli($servername, $username, $password, $dbsname);

if ($conn->connect_error) {
    die("Connection Error: ". $conn->connect_error);
} 
echo "Connected to: " . $dbsname;