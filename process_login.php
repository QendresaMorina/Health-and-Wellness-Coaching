<?php
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['login-email']);
    $password = trim($_POST['login-password']);
    
    if (empty($email) || empty($password)) {
        die("Email and password are required.");
    }

    $user = new User();
    $result = $user->login($email, $password);

    if (is_array($result)) {
        session_start();
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['is_admin'] = $result['is_admin'];

        header("Location: dashboard.php"); 
        exit();
    } else {
        echo $result; 
    }
} else {
    die("Invalid request.");
}
?>
