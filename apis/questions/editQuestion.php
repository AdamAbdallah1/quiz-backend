<?php

session_start();
include '../../config/config.php';

if (!isset($_SESSION['user'])) {
    echo "No session found";
    exit;
}

$user = $_SESSION['user'];
if ($user['is_admin'] == 1){
    echo "Welcome Admin!\n";

    $id = $_POST['id'] ?? 0;
    $new_title = $_POST['title'] ?? '';
    $new_description = $_POST['description'] ?? '';

    if ($id, $new_title, $new_description) {
        
    }
}