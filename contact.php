<?php
session_start();

// Redirect to login.php if the user is not logged in
if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}

// Handle logout: destroy session and redirect to login.php
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
                <li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="?logout=true">Logout</a>
                    <?php else: ?>
                        <a href="login.php">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="center-text">
            <h2>Contact Us</h2>
        </div>
        <!-- The contact form -->
        <form id="contact-form" onsubmit="return validateForm()" method="post" action="process_contact.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required minlength="3" maxlength="50">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required minlength="10" maxlength="500"></textarea>
            
            <button type="submit">Submit</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
