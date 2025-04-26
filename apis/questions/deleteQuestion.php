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

        
    } else {
        echo "Please provide a correct ID";
    }
}