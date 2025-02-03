<?php
session_start();
include 'database.php';
require_once 'User.php'; 


$db = new Database(); 
$conn = $db->getConnection();  

if (!isset($_SESSION['user']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}


if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}


class Product {
    public $id;
    public $name;
    public $price;
    public $image;

    public function __construct($id, $name, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }
}


$sql = "SELECT id, name, price, image FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $products[] = new Product($row['id'], $row['name'], $row['price'], $row['image']);
}


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

    


    <?php if (isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1): ?>
    <a href="add_product.php" class="buy-now add-product-btn margint">Add Product</a>
<?php endif; ?>




    <main>
        <section id="products">
            <h1>Our Products</h1>
            <p>Discover tools and resources to support your health and wellness journey.</p>
            
            <div class="product-container">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product->image); ?>" alt="<?php echo htmlspecialchars($product->name); ?>">
                        <h3><?php echo htmlspecialchars($product->name); ?></h3>
                        <p class="price">$<?php echo number_format($product->price, 2); ?></p>

                
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product->name; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product->price; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $product->image; ?>">
                            <button type="submit" class="buy-now">Buy Now</button>
                        </form>

                        <?php if ($is_admin): ?>
                            <form action="delete_product.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
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
