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
        // Successful login
        session_start();
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['is_admin'] = $result['is_admin'];

        header("Location: dashboard.php"); // or wherever you want to redirect
        exit();
    } else {
        // Failed login
        echo $result; // This will show the error message from the `login()` method
    }
} else {
    die("Invalid request.");
}
?>
