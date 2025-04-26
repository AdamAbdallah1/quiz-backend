<?php

session_start();

include '../../config/config.php';

if (!isset($_SESSION['user'])) {
    echo "No session found";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] ==1){
    echo "Welcome admin";

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $quiz_id = $_POST['quiz_id'] ?? 0;

    
}