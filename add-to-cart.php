


<?php
session_start();

if (!isset($_POST['quantity'])) {
    header("Location: index.php");
    exit;
}

$id = $_POST['product_id'];
$image = $_POST['product_image'] ?? '';
$name = $_POST['product_name'];
// $price = $_POST['price'];
$price = (float) $_POST['price'];
$final_price = (float) $_POST['final_price'];
$quantity = (int) $_POST['quantity'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($quantity == 0) {
    unset($_SESSION['cart'][$id]);
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['cart'][$id])) {
    // $_SESSION['cart'][$id]['quantity'] += $quantity;
    $_SESSION['cart'][$id]['quantity'] = $quantity;
} else {
    $_SESSION['cart'][$id] = [
        'image' => $image,
        'name' => $name,
        'price' => $price,
        'final_price' => $final_price, 
        'quantity' => $quantity
    ];
}

header("Location: index.php");
exit;