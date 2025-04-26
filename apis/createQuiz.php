<?php

include '../config/config.php';

//echo "Quiz: " . $title . " Created!";

session_start();
$is_admin = $_SESSION['is_admin'];
if ($is_admin == 1) {
    $currAdmin = $_SESSION['currAdmin'];
    echo "Welcome Admin: " . $currAdmin;
    $title = $_POST['title'] ?? '';
    $description = $_POST['question'] ?? '';
} else {
    echo "You are not an admin!";
}