<?php
session_start();

// Redirect to login.php if the user is not logged in
if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}

// Handle logout and redirect to login.php
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
    <title>About Us</title>
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
        <h2>About Us</h2>
        <p>At Health and Wellness Coaching, we are passionate about helping you live a healthier and happier life.</p>
        <p>We specialize in health and wellness coaching, focusing on your physical, mental, and emotional well-being.</p>
        <p>Our goal is to support you in building better habits, reducing stress, and achieving balance in your life.</p>
        <p>We believe that everyone is unique, so we create personalized plans that fit your needs and lifestyle.</p>
        <p>We’re here to guide and motivate you every step of the way.</p>
        <p>Together, we can help you reach your full potential and enjoy the life you deserve.</p>
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
</body>
</html>
