<?php
session_start();
include 'database.php';
require_once 'User.php'; // Include the User class

// Redirect if not admin
if (!isset($_SESSION['user']) || !User::isAdmin()) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();

// Handle product submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    
    // Handle image upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $imageTmpName = $_FILES['product_image']['tmp_name'];
        $imageName = basename($_FILES['product_image']['name']);
        $imageSize = $_FILES['product_image']['size'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
        // Allow only specific file types
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageExt, $allowedExts) && $imageSize <= 5000000) { // 5MB max size
            $imagePath = 'uploads/' . uniqid() . '.' . $imageExt;
            
            // Move the uploaded image to the desired directory
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                // Insert product into database
                $sql = "INSERT INTO products (name, price, image) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$name, $price, $imagePath]);

                header("Location: products.php"); // Redirect back to the products page
                exit();
            } else {
                echo "<p>Sorry, there was an error uploading your file.</p>";
            }
        } else {
            echo "<p>Invalid file type or file size too large. Allowed types: jpg, jpeg, png, gif. Max size: 5MB.</p>";
        }
    } else {
        echo "<p>Please select an image to upload.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your existing CSS -->
</head>
<body>

    <!-- Header and Navigation Bar -->
    <header>
        <h1>Health and Wellness Coaching</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php">Cart</a></li>
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

    <!-- Main content -->
    <main>
        <section id="add-product">
            <h2>Add New Product</h2>

            <!-- Add product form with file upload for image -->
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>

                <label for="product_price">Price:</label>
                <input type="text" id="product_price" name="product_price" required>

                <label for="product_image">Upload Image:</label>
                <input type="file" id="product_image" name="product_image" accept="image/*" required>

                <button type="submit" class="add-btn">Add Product</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>

</body>
</html>
