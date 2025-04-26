<?php

session_start();

include '../config/config.php';

if (!isset($_SESSION['user'])){
    echo "No session found!";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] == 1){
    $id = $_POST['id'] ?? 0;

    if ($id){
        $sql = "DELETE FROM quizzes WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Quiz deleted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Please provide correct ID";
    }
} else {
    echo "Only admins can delete the quiz";
}
$conn->close();