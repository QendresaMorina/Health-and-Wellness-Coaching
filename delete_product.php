<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "your_database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
