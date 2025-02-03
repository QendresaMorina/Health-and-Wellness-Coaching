<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = [
        "id" => $_POST["product_id"],
        "name" => $_POST["product_name"],
        "price" => $_POST["product_price"],
        "image" => $_POST["product_image"]
    ];

    $_SESSION["cart"][] = $product;
}

if (isset($_GET["remove"])) {
    $remove_id = $_GET["remove"];
    foreach ($_SESSION["cart"] as $key => $item) {
        if ($item["id"] == $remove_id) {
            unset($_SESSION["cart"][$key]);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
        <nav>
            <ul>
                <li><a href="products.php">Back to Products</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Your Cart</h2>
        <div class="cart-container">
            <?php if (!empty($_SESSION["cart"])): ?>
                <?php foreach ($_SESSION["cart"] as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo htmlspecialchars($item["image"]); ?>" alt="<?php echo htmlspecialchars($item["name"]); ?>">
                        <h3><?php echo htmlspecialchars($item["name"]); ?></h3>
                        <p>Price: $<?php echo number_format($item["price"], 2); ?></p>
                        <a href="cart.php?remove=<?php echo $item["id"]; ?>" class="remove-btn">Remove</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Health and Wellness Coaching</p>
    </footer>
</body>
</html>