<?php
session_start();

// Verifikimi nëse përdoruesi është admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Për të shtuar një produkt duhet të jeni admin.');
}

// Kontrollo nëse janë dërguar të dhënat për produktin
if (isset($_POST['product_name'], $_POST['product_price'], $_POST['product_image'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Këtu mund të shtoni kodin për të ruajtur produktin në bazën e të dhënave
    echo "Produkt është shtuar me sukses!";
} else {
    echo "Ju lutem plotësoni të gjitha të dhënat.";
}
?>
