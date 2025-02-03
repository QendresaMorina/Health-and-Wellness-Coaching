<?php
session_start();

if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}

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
    <title>Health and Wellness Coaching</title>
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

    <main class="main-content">
        <section class="hero">
            <h2>Your One-Stop Solution</h2>
            <div class="slider-container">
                <div class="slider">
                    <div class="slide"><img src="coach.jpg" alt="Coach 1"></div>
                    <div class="slide"><img src="coach1.jpg" alt="Coach 2"></div>
                    <div class="slide"><img src="coach2.jpg" alt="Coach 3"></div>
                </div>
                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
            </div>
            <h4>Discover amazing opportunities with us!</h4>
            <h4>Imagine a life where you wake up each day feeling energized, confident, and in control of your mind and body.</h4>
            <h4>At Health and Wellness Coaching, we're here to make that vision your reality.</h4>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
</body>
</html>
