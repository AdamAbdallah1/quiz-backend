<?php

include '../config/config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    $sql = "SELECT * FROM users where username = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $email, $password);

    
}