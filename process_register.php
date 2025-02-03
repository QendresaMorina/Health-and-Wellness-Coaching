<?php
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['register-name']);
    $email = trim($_POST['register-email']);
    $password = trim($_POST['register-password']);
    $confirmPassword = trim($_POST['register-confirm-password']);

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }
    $user = new User();
    $result = $user->register($name, $email, $password);
    
    if ($result === "Registration successful. You can now <a href='login.php'>log in</a>.") {
        header("Location: index.php");
        exit();
    } else {
        echo $result;
    }
} else {
    die("Invalid request.");
}
?>
