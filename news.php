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
    <title>News</title>
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
        <h2>Latest News</h2>

        <article>
            <h3>Stay Ahead with Health and Wellness Coaching - Exclusive Offers!</h3>
            <p>Here's what we've got for you:</p>

            <section>
                <h3>1. Free Online Wellness Training</h3>
                <p>Access a FREE 30-minute online coaching session with our expert trainers. Whether you're looking to start a fitness routine, learn about healthy eating, or manage stress, we've got you covered.</p>
            </section>

            <section>
                <h3>2. Special Discount on Our Premium Products</h3>
                <p>Enjoy a 20% discount on all our wellness products, including e-books, fitness tools, and guided programs. These resources are designed to help you build healthy habits and achieve long-term success.</p>
            </section>

            <section>
                <h3>3. Access to Wellness Webinars</h3>
                <p>Join our free monthly webinars, where we discuss the latest health trends, share tips for a balanced lifestyle, and answer your questions live.</p>
            </section>

            <h3>Stay connected and informed!</h3>
        </article>
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
</body>
</html>
