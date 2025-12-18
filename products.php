<?php
include 'imports.php';
require_once('./products_data.php');
// Template Name: Products Page
global $product_data_array;
$product_id = $_GET['id'] ?? 1;
$product = get_product_by_id($product_id);
$discount_price = get_discount_price($product_id);

if (!$product) {
    echo "Product not found";
    exit;
}

// echo '<pre>';
// print_r($product_data_array);
// echo '</pre>';

$price = $product['price'];
$discount = 0;
$discountPercent = 0;

if (!empty($product['discounts'])) {
    foreach ($product['discounts'] as $d) {
        if ($d['is_active']) {
            $discountPercent = $d['type'] === 'percentage' ? $d['amount'] : 0;
            $discount = ($discountPercent / 100) * $price;
            break;
        }
    }
}

$final_price = $price - $discount;
// echo '<pre>';
// print_r($final_price);
// echo '</pre>';

// quantity in cart
$quantityInCart = $_SESSION['cart'][$product_id]['quantity'] ?? 0;
$buttonText = $quantityInCart > 0 ? "Update Cart" : "Add to Cart";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products</title>

</head>

<body class="">

<div class="container archive-products mt-5">
    <div class="row">
        <?php foreach ($product_data_array as $product): ?>
            <?php
            $price = $product['price'];
            $discount = 0;

            if (!empty($product['discounts'])) {
                foreach ($product['discounts'] as $d) {
                    if ($d['is_active'] && $d['type'] === 'percentage') {
                        $discount = ($d['amount'] / 100) * $price;
                        break;
                    }
                }
            }

            $final_price = $price - $discount;
            ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <a href="single-product.php?id=<?= $product['id']; ?>">
                    <div class="product-card">
                    <figure>
                        <img src="<?= $product['image_path']; ?>"
                             alt="<?= htmlspecialchars($product['name']); ?>" class="">

                        <!-- Overlay -->
                        <figcaption>
                            <h5><?= htmlspecialchars($product['name']); ?></h5>

                            <p>
                                €<?= number_format($final_price, 2); ?>
                                <?php if ($discount > 0): ?>
                                    <span class="old-price">
                                        €<?= number_format($price, 2); ?>
                                    </span>
                                <?php endif; ?>
                            </p>
                        </figcaption>
                    </figure>
                </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>

</html>