<?php

session_start();

include '../config/config.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['id'] > 0){
        echo "Welcome User: " . $user['username'];

        $sql = "SELECT * FROM quizzes";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        

    } else {
        echo "Invalid User Id";
    }
} else {
    echo "No user logged in";
}

?>