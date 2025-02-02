<?php
$host = "localhost"; // Ose IP e serverit të bazës së të dhënave
$dbname = "health_and_wellness_coaching"; // Ndrysho këtë me emrin e bazës tënde
$username = "root"; // Ndrysho këtë nëse ke përdorues tjetër
$password = ""; // Fillo bosh nëse nuk ke fjalëkalim për MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lidhja me bazën e të dhënave dështoi: " . $e->getMessage());
}
?>
