<?php

session_start();
include '../../config/config.php';

if (!isset($_SESSION['user'])) {
    echo "No session found";
    exit;
}

$user = $_SESSION['user'];

if ($user['is_admin'] == 1) {
    echo "Welcome admin";

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $quiz_id = $_POST['quiz_id'] ?? 0;

    if ($title && $description && $quiz_id) {
        $sql = "INSERT INTO questions (title, description, quiz_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $quiz_id);

        if ($stmt->execute()) {
            echo "Question: " . $title  . " Created Successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Please provide required fields: Title, Description, and Quiz ID.";
    }
}

$conn->close();
?>
