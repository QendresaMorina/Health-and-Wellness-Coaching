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

// Redirect if not admin
require_once 'User.php'; // Include the User class
if (!User::isAdmin()) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
include 'database.php';
$db = new Database();
$conn = $db->getConnection();

// Handle product submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_POST['product_image']; // Ideally, you would want to handle file uploads properly

    $sql = "INSERT INTO products (name, price, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $price, $image]);

    $_SESSION['success'] = "Product added successfully!";
    header("Location: add_product.php"); // Redirect back to the add product page
    exit();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
            <h2>Add New Product</h2>
        </div>

        <!-- The product form -->
        <form id="add-product-form" method="POST" action="add_product.php">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required minlength="3" maxlength="100">
            
            <label for="product_price">Price:</label>
            <input type="text" id="product_price" name="product_price" required>

            <label for="product_image">Image URL:</label>
            <input type="text" id="product_image" name="product_image" required>

            <!-- Success message placeholder -->
            <?php
            if (isset($_SESSION['success'])) {
                echo '<p style="color: green; margin-top: 5px;">' . $_SESSION['success'] . '</p>';
                unset($_SESSION['success']);
            }
            ?>

            <button type="submit">Add Product</button>
        </form>

        <!-- Optional Error message -->
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p style="color: red; margin-top: 5px;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>
