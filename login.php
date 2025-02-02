<?php
require_once 'User.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="styles.css">
    <script src="app.js"></script>
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="login-form-section">
            <h2>Log In</h2>
            <form id="login-form" action="process_login.php" method="POST" onsubmit="return validateLoginForm()">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="login-email">

                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="login-password">
                <div id="login-error-message" class="error-message" style="display:none;">Please enter a valid email and password.</div>

                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="javascript:void(0);" onclick="showRegisterForm()">Register here</a></p>
        </div>

        <div id="register-form-section" style="display:none;">
            <h2>Register</h2>
            <form id="register-form" action="process_register.php" method="POST" onsubmit="return validateRegisterForm()">
                <label for="register-name">Name:</label>
                <input type="text" id="register-name" name="register-name">

                <label for="register-email">Email:</label>
                <input type="email" id="register-email" name="register-email">

                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="register-password">

                <label for="register-confirm-password">Confirm Password:</label>
                <input type="password" id="register-confirm-password" name="register-confirm-password">

                <div id="register-error-message" class="error-message" style="display:none;">Please make sure passwords match and email is valid.</div>

                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="javascript:void(0);" onclick="showLoginForm()">Log In here</a></p>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>

    <script src="app.js"></script>
</body>
</html>
