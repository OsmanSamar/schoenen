<?php
session_start();

if (!isset($_POST['quantity'])) {
    // header("Location: index.php");
    
    echo json_encode(['status'=>400,'message'=>'geen aantal gekozen']);
    exit;
}

$id = $_POST['product_id'];
$merk = $_POST['product_merk'];
$image = $_POST['product_image'] ?? '';
$name = $_POST['product_name'];
$details = $_POST['product_details'];
// $price = $_POST['price'];
$price = (float) $_POST['price'];
$discounts = (float) $_POST['discounts'];
$final_price = (float) $_POST['final_price'];
$quantity = (int) $_POST['quantity'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($quantity == 0) {
    unset($_SESSION['cart'][$id]);
    // header("Location: index.php");

    echo json_encode(['status' => 200, 'message' => 'product toegevoegd']);
    exit;
}

if (isset($_SESSION['cart'][$id])) {
    // $_SESSION['cart'][$id]['quantity'] += $quantity;
    $_SESSION['cart'][$id]['quantity'] = $quantity;

} else {
    $_SESSION['cart'][$id] = [
        'image' => $image,
        'merk' => $merk,
        'name' => $name,
        'details' => $details,
        'price' => $price,
        'final_price' => $final_price,
        'discounts' => $discounts,
        'quantity' => $quantity
    ];
}
echo json_encode([
    'status' => 200, 
    'message' => 'product toegevoegd',
    'cart-count'=> 5,
    'cart-html'=>'<div>test</div>'
]);
// // header("Location: single-product.php");
exit;
// refresh
// header("Location: " . $_SERVER['HTTP_REFERER']);
// exit;