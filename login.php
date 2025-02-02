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
            <form id="login-form" onsubmit="return validateLoginForm()">
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
            <form id="register-form" onsubmit="return validateRegisterForm()">
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
<script>
        function validateLoginForm() {
            var email = document.getElementById('login-email').value;
            var password = document.getElementById('login-password').value;
            var errorMessage = document.getElementById('login-error-message');

            // Check if email and password are filled
            if (email === "" || password === "") {
                errorMessage.style.display = "block";
                return false;
            }

            // You can add further validation here if needed (e.g., check email format)

            // Redirect to homepage if login is successful (this is a placeholder)
            // Normally you would validate against a database on the server side
            window.location.href = "index.php"; // Redirect to homepage after successful login
            return false; // Prevent form submission since we're handling redirection in JS
        }

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