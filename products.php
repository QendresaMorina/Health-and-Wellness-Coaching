<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
    <script src="app.js" defer></script>
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
                <li><a href="cart.html">Cart</a></li> <!-- Link për shportën -->
            </ul>
        </nav>
    </header>
    <main>
        <section id="products">
            <h1>Our Products</h1>
            <p>Discover tools and resources to support your health and wellness journey.</p>
            
            <div class="product-container">
                <!-- 10 Produktet -->
                <div class="product-card" data-id="1">
                    <img src="photo.jpg" alt="Wellness E-book">
                    <h3>Wellness E-book</h3>
                    <p>A guide to building healthy habits for life.</p>
                    <p class="price">$19.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="2">
                    <img src="photo1.jpg" alt="Yoga Mat">
                    <h3>Yoga Mat</h3>
                    <p>High-quality mat for your daily practice.</p>
                    <p class="price">$29.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="3">
                    <img src="photo2.jpg" alt="Healthy Recipes E-book">
                    <h3>Healthy Recipes E-book</h3>
                    <p>Delicious and nutritious recipes for every meal.</p>
                    <p class="price">$14.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="4">
                    <img src="photo3.jpg" alt="Resistance Bands">
                    <h3>Resistance Bands</h3>
                    <p>Perfect for strength training and stretching.</p>
                    <p class="price">$24.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="5">
                    <img src="photo4.jpg" alt="Fitness Tracker">
                    <h3>Fitness Tracker</h3>
                    <p>Monitor your steps, calories, and sleep patterns.</p>
                    <p class="price">$49.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="6">
                    <img src="photo5.jpg" alt="Detox Tea">
                    <h3>Detox Tea</h3>
                    <p>A refreshing blend to support your digestive health.</p>
                    <p class="price">$12.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="7">
                    <img src="photo6.jpg" alt="Meditation App Subscription">
                    <h3>Meditation App Subscription</h3>
                    <p>Access guided meditations and mindfulness exercises.</p>
                    <p class="price">$5.99/month</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="8">
                    <img src="photo7.jpg" alt="Essential Oils Set">
                    <h3>Essential Oils Set</h3>
                    <p>Aromatherapy oils to promote relaxation and focus.</p>
                    <p class="price">$39.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="9">
                    <img src="photo8.jpg" alt="Foam Roller">
                    <h3>Foam Roller</h3>
                    <p>Great for muscle recovery and reducing tension.</p>
                    <p class="price">$18.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>

                <div class="product-card" data-id="10">
                    <img src="photo9.jpg" alt="Hydration Bottle">
                    <h3>Hydration Bottle</h3>
                    <p>Stay hydrated with a sleek, durable water bottle.</p>
                    <p class="price">$14.99</p>
                    <button class="buy-now">Buy Now</button>
                    <button class="delete-btn" style="display: none;">Delete</button>
                </div>
            </div>
        </section>          
    </main>
    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
</body>
</html>
