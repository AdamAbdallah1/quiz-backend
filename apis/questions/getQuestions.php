<?php

session_start();

include '../../config/config.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    if ($user['id'] > 0){
        echo "Welcome User: " . $user['username'];

        $quiz_id = $_POST['quiz_id'];
        if ($quiz_id) {
            $sql = "SELECT * FROM questions WHERE quiz_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $quiz_id);

            $stmt->execute();
            $reslut = $stmt->get_result();

            if ($reslut->num_rows > 0){
                while ($question = $reslut->fetch_assoc()){
                    echo "\n=================\nQuiz: " . $quiz_id . "\n";
                    echo "Qustion ID: " . $question['question_id'] . "\n";
                    echo "Question Title: " . $question['title'] . "\n";
                    echo "Question Description: " . $question['description'] . "\n";
                }
            }
        }

    }

}


