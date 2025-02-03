<?php
require_once 'User.php';
session_start(); // Start session at the beginning

// Kontrollo nëse formulari është dërguar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login-submit'])) {
        // Destroy previous session if user was already logged in
        session_destroy();
        session_start();

        // Login form submitted
        $email = $_POST['login-email'];
        $password = $_POST['login-password'];

        $user = new User();
        $loginResult = $user->login($email, $password);

        if (is_array($loginResult)) {
            // Përdoruesi ka hyrë me sukses
            $_SESSION['user'] = $loginResult;
            header("Location: index.php"); // Redirektoni në faqen kryesore
            exit();
        } else {
            // Gabim gjatë login-it
            $errorMessage = $loginResult;
        }
    } elseif (isset($_POST['register-submit'])) {
        // Register form submitted
        $name = $_POST['register-name'];
        $email = $_POST['register-email'];
        $password = $_POST['register-password'];
        $confirmPassword = $_POST['register-confirm-password'];

        if ($password !== $confirmPassword) {
            $errorMessage = "Passwords do not match!";
        } else {
            $user = new User();
            $registrationResult = $user->register($name, $email, $password);
            $successMessage = $registrationResult;
        }
    }
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In / Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Health and Wellness Coaching</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="login_register.php?logout=true">Logout</a>
                    <?php else: ?>
                        <a href="login_register.php">Login/Register</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <?php if (!isset($_SESSION['user'])): ?>
        <!-- Login Section -->
        <div id="login-form-section">
            <h2>Log In</h2>
            <?php if (isset($errorMessage)) { echo "<p class='error'>$errorMessage</p>"; } ?>
            <form method="POST" id="login-form">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="login-email" required>

                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="login-password" required>

                <button type="submit" name="login-submit">Login</button>
            </form>
            <p>Don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">Register here</a></p>
        </div>

        <!-- Register Section -->
        <div id="register-form-section" style="display:none;">
            <h2>Register</h2>
            <?php if (isset($errorMessage)) { echo "<p class='error'>$errorMessage</p>"; } ?>
            <?php if (isset($successMessage)) { echo "<p class='success'>$successMessage</p>"; } ?>
            <form method="POST" id="register-form">
                <label for="register-name">Name:</label>
                <input type="text" id="register-name" name="register-name" required>

                <label for="register-email">Email:</label>
                <input type="email" id="register-email" name="register-email" required>

                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="register-password" required>

                <label for="register-confirm-password">Confirm Password:</label>
                <input type="password" id="register-confirm-password" name="register-confirm-password" required>

                <button type="submit" name="register-submit">Register</button>
            </form>
            <p>Already have an account? <a href="javascript:void(0);" onclick="showLoginForm()">Log In here</a></p>
        </div>
        <?php else: ?>
            <h2>Welcome, <?= htmlspecialchars($_SESSION['user']['name']); ?>!</h2>
            <p>You are already logged in.</p>
            <a href="login_register.php?logout=true">Logout</a>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>

    <script>
        // Functions to toggle between login and register forms
        function showRegisterForm() {
            document.getElementById('login-form-section').style.display = 'none';
            document.getElementById('register-form-section').style.display = 'block';
        }

        function showLoginForm() {
            document.getElementById('login-form-section').style.display = 'block';
            document.getElementById('register-form-section').style.display = 'none';
        }
    </script>
</body>
</html>
