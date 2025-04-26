<?php

session_start();

include '../config/config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    $sql = "SELECT * FROM users where email = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1){
        $user = $result->fetch_assoc();
        $user = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'password' => $user['password'],
            'is_admin' => $user['is_admin']
        ];

        $_SESSION['user'] = $user;
        if ($user['is_admin'] == 1) {
            echo "Welcome Admin: " . $user['username'];
                    } else{
            echo "Welcome User: " . $user['username'];
            
        }
    } else {
        echo "Invalid Email or Password";
    } 
    $stmt->close();
} else {
    echo "Please enter both Email and Password!";
}
$conn->close();
?>
