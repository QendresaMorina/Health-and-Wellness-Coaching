<?php
session_start();

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class file
    require_once 'database.php';
    
    // Create a new Database instance and get the connection
    $database = new Database();
    $conn = $database->getConnection();

    // Retrieve and sanitize input values
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Prepare the SQL statement using named placeholders
    $sql = "INSERT INTO contact1 (name, email, message) VALUES (:name, :email, :message)";
    
    try {
        $stmt = $conn->prepare($sql);
        
        // Bind the parameters to the query
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        
        // Execute the query
        $stmt->execute();
        
        // Set a session flash message for success
        $_SESSION['success'] = "Thank you for contacting us!";
        
        // Redirect back to the contact page (optionally include an anchor to scroll to the form)
        header("Location: contact.php#contact-form");
        exit();
    } catch (PDOException $e) {
        // You might want to set an error message as well, similar to the success message
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: contact.php#contact-form");
        exit();
    }
} else {
    // If the request method is not POST, redirect back to the contact form
    header("Location: contact.php");
    exit();
}
?>
