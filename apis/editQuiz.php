<?php
session_start();

include '../config/config.php';

if (isset($_SESSION['user'])) {
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

            
        }

    }
}