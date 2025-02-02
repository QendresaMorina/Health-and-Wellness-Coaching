<?php
session_start(); // Startojmë sesionin për shportën

$products = [
    ["id" => 1, "name" => "Wellness E-book", "price" => 19.99, "image" => "photo.jpg", "description" => "A guide to building healthy habits for life."],
    ["id" => 2, "name" => "Yoga Mat", "price" => 29.99, "image" => "photo1.jpg", "description" => "High-quality mat for your daily practice."],
    ["id" => 3, "name" => "Healthy Recipes E-book", "price" => 14.99, "image" => "photo2.jpg", "description" => "Delicious and nutritious recipes for every meal."],
    ["id" => 4, "name" => "Resistance Bands", "price" => 24.99, "image" => "photo3.jpg", "description" => "Perfect for strength training and stretching."],
    ["id" => 5, "name" => "Fitness Tracker", "price" => 49.99, "image" => "photo4.jpg", "description" => "Monitor your steps, calories, and sleep patterns."],
    ["id" => 6, "name" => "Detox Tea", "price" => 12.99, "image" => "photo5.jpg", "description" => "A refreshing blend to support your digestive health."],
    ["id" => 7, "name" => "Meditation App Subscription", "price" => 5.99, "image" => "photo6.jpg", "description" => "Access guided meditations and mindfulness exercises."],
    ["id" => 8, "name" => "Essential Oils Set", "price" => 39.99, "image" => "photo7.jpg", "description" => "Aromatherapy oils to promote relaxation and focus."],
    ["id" => 9, "name" => "Foam Roller", "price" => 18.99, "image" => "photo8.jpg", "description" => "Great for muscle recovery and reducing tension."],
    ["id" => 10, "name" => "Hydration Bottle", "price" => 14.99, "image" => "photo9.jpg", "description" => "Stay hydrated with a sleek, durable water bottle."]
];

?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .product-card {
            width: 250px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            background: #fff;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .buy-now {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .buy-now:hover {
            background-color: #218838;
        }
    </style>
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
                <li><a href="cart.php">Cart</a></li>
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
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p class="price">$<?php echo number_format($product['price'], 2); ?></p>

                        <!-- Forma për të shtuar produktin në shportë -->
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
                            <button type="submit" class="buy-now">Buy Now</button>
                        </form>
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