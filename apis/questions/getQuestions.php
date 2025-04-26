<?php

session_start();
include '../../config/config.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    if ($user['id'] > 0) {
        echo "Welcome User: " . $user['username'];

        $quiz_id = $_POST['quiz_id'] ?? 0;
        if ($quiz_id) {
            $sql = "SELECT * FROM questions WHERE quiz_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $quiz_id);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($question = $result->fetch_assoc()) {
                    echo "\n=================\n";
                    echo "Quiz ID: " . $quiz_id . "\n";
                    echo "Question ID: " . $question['question_id'] . "\n";
                    echo "Question Title: " . $question['title'] . "\n";
                    echo "Question Description: " . $question['description'] . "\n";
                }
            } else {
                echo "No questions found";
            }
            $stmt->close();
        }
    }
} else {
    echo "No user found";
}

$conn->close();
?>
