<?php
session_start();

include '../config/config.php';

if (!isset($_SESSION['user'])){
    echo "No session found!";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] == 1){
    $user = $_SESSION['user'];
    if ($user['id'] > 0) {
        echo "Welcome User: " . $user['username'] . "\n";
        
        $id = $_POST['id'] ?? 0;
        $new_title = $_POST['title'] ?? '';
        $new_description = $_POST['description'] ?? '';

        if ($id && $new_title && $new_description) {
            $sql = "UPDATE quizzes SET title = ?, description = ?  WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $new_title, $new_description, $id);

            if ($stmt->execute()){
                echo "Quiz updates seccessfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Please provide ID, new title, new description";
        }
    }
} else {
    echo "Only admins can edit quizzes";
}
$conn->close();