<?php
session_start();

// Redirect to login.php if the user is not logged in
if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Product and User class definitions
class Product {
    public $id;
    public $name;
    public $price;
    public $image;
    public $description;

    public function __construct($id, $name, $price, $image, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
    }
}

class User {
    public static function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}

// Define products
$products = [
    new Product(1, "Wellness E-book", 19.99, "photo.jpg", "A guide to building healthy habits for life."),
    new Product(2, "Yoga Mat", 29.99, "photo1.jpg", "High-quality mat for your daily practice."),
    new Product(3, "Healthy Recipes E-book", 14.99, "photo2.jpg", "Delicious and nutritious recipes for every meal."),
    new Product(4, "Resistance Bands", 24.99, "photo3.jpg", "Perfect for strength training and stretching."),
    new Product(5, "Fitness Tracker", 49.99, "photo4.jpg", "Monitor your steps, calories, and sleep patterns."),
    new Product(6, "Detox Tea", 12.99, "photo5.jpg", "A refreshing blend to support your digestive health."),
    new Product(7, "Meditation App Subscription", 5.99, "photo6.jpg", "Access guided meditations and mindfulness exercises."),
    new Product(8, "Essential Oils Set", 39.99, "photo7.jpg", "Aromatherapy oils to promote relaxation and focus."),
    new Product(9, "Foam Roller", 18.99, "photo8.jpg", "Great for muscle recovery and reducing tension."),
    new Product(10, "Hydration Bottle", 14.99, "photo9.jpg", "Stay hydrated with a sleek, durable water bottle.")
];

// Check if user is admin
$is_admin = User::isAdmin();
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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

    <main>
        <section id="products">
            <h1>Our Products</h1>
            <p>Discover tools and resources to support your health and wellness journey.</p>
            
            <div class="product-container">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product->image); ?>" alt="<?php echo htmlspecialchars($product->name); ?>">
                        <h3><?php echo htmlspecialchars($product->name); ?></h3>
                        <p><?php echo htmlspecialchars($product->description); ?></p>
                        <p class="price">$<?php echo number_format($product->price, 2); ?></p>

                        <!-- Add to Cart Form -->
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product->name; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product->price; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $product->image; ?>">
                            <button type="submit" class="buy-now">Buy Now</button>
                        </form>

                        <!-- Admin Controls -->
                        <?php if ($is_admin): ?>
                            <form action="delete_product.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>

                            <form action="add_product.php" method="post">
                                <input type="hidden" name="product_name" value="<?php echo $product->name; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $product->price; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $product->image; ?>">
                                <button type="submit" class="add-btn">Add</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>          
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
</body>
</html>
