<?php

include '../config/config.php';

$username = $_POST['user_name'] ?? '';
$email = $_POST['user_email'] ?? '';
$password = $_POST['user_password'] ?? '';

if ($username && $email && $password) {
    $is_admin = 0;

    $sql = "INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);


}