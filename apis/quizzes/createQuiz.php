<?php

session_start();

include '../config/config.php';

if (!isset($_SESSION['user'])) {
    echo "No session found!";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] == 1){
    echo "You are admin: " . $user['username'];

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    if ($title && $description) {
        $sql = "INSERT INTO quizzes (title, description, id_admin) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $user['id']);

        $stmt->execute();
        
    }

}else {
    echo "Normal user";
}