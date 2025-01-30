<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    
    // Hash the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    echo "<p>Hashed Password: <strong>$hashedPassword</strong></p>";
    
    // Simulate verifying against stored hash (replace with actual stored hash from MySQL)
    $storedHash = $hashedPassword; // Normally, you'd fetch this from your database
    
    if (password_verify($password, $storedHash)) {
        echo "<p>Password is correct!</p>";
    } else {
        echo "<p>Password is incorrect!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Password Hashing</title>
</head>
<body>
    <form method="POST">
        <label for="password">Enter Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Hash & Verify</button>
    </form>
</body>
</html>
