<?php
$pdo = new PDO('mysql:host=localhost;dbname=your_db_name', 'your_db_user', 'your_db_password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
