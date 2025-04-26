<?php

session_start();

include '../../config/config.php';

if (!isset($_SESSION['user'])){
    echo "No session found!";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] == 1){
    $id = $_POST['id'];

    if ($id){
        $sql = "DELETE FROM questions WHERE question_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()){
            echo "Question Deleted Successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Please provide a correct ID";
    } 
} else {
    echo "Only admins can delete the question";
}
$conn->close();