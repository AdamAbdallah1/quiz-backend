<?php

session_start();
include '../../config/config.php';

if (!isset($_SESSION['user'])) {
    echo "No session found";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] == 1){
    echo "Welcome Admin!\n";

    $id = $_POST['id'] ?? 0;
    $new_title = $_POST['title'] ?? '';
    $new_description = $_POST['description'] ?? '';

    if ($id && $new_title && $new_description) {
        $sql = "UPDATE questions SET title = ?, description = ?, WHERE question_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $new_title, $new_description, $id);
        
        if ($stmt->execute()){
            echo "Question updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Provide new title new description and quiz_id";
    }
} else {
    echo "Only admins can edit questions";
}
$conn->close();