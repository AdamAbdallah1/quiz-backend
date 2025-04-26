<?php

session_start();

include '../../config/config.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    
}
