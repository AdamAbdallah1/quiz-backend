<?php

session_start();

include '../../config/config.php';

if (!isset($_SESSION['user'])){
    echo "No session found!";
    exit;
}

$user = $_SESSION['user'];