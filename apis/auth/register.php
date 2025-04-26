<?php

include '../config/config.php';

$username = $_POST['username'] ?? '';
$email = $_POST["email"] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $email && $password) {
    $is_admin = 0;

    $sql = "INSERT INTO users (username, email, password, is_admin) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssi", $username, $email, $password, $is_admin);

    if ($stmt->execute()) {
        echo "User: ". $username . " Registered Successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

} else {
    echo "Please provide username, email and password.";
}

$conn->close();
?>