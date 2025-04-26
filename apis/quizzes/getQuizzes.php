<?php

session_start();
header("Content-Type: text/html");

include '../config/config.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['id'] > 0){
        echo "Welcome User: " . $user['username'];

        $sql = "SELECT * FROM quizzes";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($quiz = $result->fetch_assoc()) {
                echo "\n============\nQuiz ID: " . $quiz['id'] . "\n";
                echo "Quizz Title: " . $quiz['title'] . " \n";
                echo "Description: " . $quiz['description'] . "\n";
                echo "Owner: " . $_SESSION['user']['username'] . " \n===============\n";
            }
        } else {
            echo "No quizzes found";
        }
        $stmt->close();

    } else {
        echo "Invalid User Id";
    }
} else {
    echo "No user logged in";
}
$conn->close();
?>