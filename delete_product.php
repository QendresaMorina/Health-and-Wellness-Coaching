<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] !== 1) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_and_wellness_coaching";  // Update to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If a product ID is provided, delete the product
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: products.php");
        exit();
    } else {
        echo "Error: Product could not be deleted.";
    }
} else {
    echo "No product ID provided.";
}

$conn->close();
?>
