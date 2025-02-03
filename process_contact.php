<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'database.php';
    $database = new Database();
    $conn = $database->getConnection();
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    $sql = "INSERT INTO contact1 (name, email, message) VALUES (:name, :email, :message)";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        
        $stmt->execute();
        
        $_SESSION['success'] = "Thank you for contacting us!";
        
        header("Location: contact.php#contact-form");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: contact.php#contact-form");
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
?>
