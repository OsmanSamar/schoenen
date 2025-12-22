<?php
require_once('./products_data.php');

session_start();

$cartCount = 0;

// New added
$subtotalBeforeDiscount = 0;
$total = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {


        $cartCount += $item['quantity'];

        // $subtotalBeforeDiscount += $item['price'] * $item['quantity'];
        // $total += $item['final_price'] * $item['quantity'];
    }
}

// $discountAmount = $subtotalBeforeDiscount - $total;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'imports.php'; ?>
    <title>Order Summary</title>
</head>

<body class="check-out">
    <?php include 'header.php'; ?>

    <div class="container">



        <?php if (!empty($_SESSION['cart'])): ?>
            <hr>

            <div class="row  check-wrapper mt-5 ">
                <hr class="mt-5">
                <div class="col-12 col-lg-6 py-5">
                    <div class=" p-5">
                        <?php
                        $itemCount = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $itemCount += $item['quantity'];
                        }
                        ?>
                        <h2>Shopping Cart (<?= $itemCount; ?> item<?= $itemCount > 1 ? 's' : ''; ?>)</h2>
                        <p>Package will be delivered by Sneakers.
                            <br />
                            Tomorrow,
                            <?php echo date('M d', strtotime("+1 days")); ?>
                            -
                            <?php echo date('D, M d', strtotime("+3 days")); ?>
                        </p>
                        <div class="order-wrapper">
                            <?php
                            $total = 0;
                            $totalDiscount = 0;
                            foreach ($_SESSION['cart'] as $id => $item): ?>
                                <div class="d-flex align-items-center mb-3 gap-3">
                                   
                                    <a href="single-product.php?id=<?= $id; ?>">
                                        <img src="<?= $item['image']; ?>" width="60" class="rounded">
                                    </a>
                                    <div class="flex-grow-1">
                                        <div><?= $item['name']; ?></div>
                                        <!-- Quantity controls -->
                                        <div class="d-flex align-items-center gap-2 mt-2">
                                            <!-- minus -->
                                            <form method="post" action="update-cart.php">
                                                <input type="hidden" name="product_id" value="<?= $id; ?>">
                                                <input type="hidden" name="action" value="decrease">
                                                <button type="submit" class="qty-btns">−</button>
                                            </form>
                                            <strong><?= $item['quantity']; ?></strong>
                                            <!-- plus -->
                                            <form method="post" action="update-cart.php">
                                                <input type="hidden" name="product_id" value="<?= $id; ?>">
                                                <input type="hidden" name="action" value="increase">
                                                <button type="submit" class="qty-btns">+</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- subtotal -->
                                    <!-- 1 -->
                                    <strong>
                                        € <?= format_price($item['final_price'] * $item['quantity']); ?>
                                    </strong>
                                    <!-- delete -->
                                    <form method="post" action="update-cart.php">
                                        <input type="hidden" name="product_id" value="<?= $id; ?>">
                                        <input type="hidden" name="action" value="remove">
                                        <button type="submit" class="cart-delete">
                                            <img src="images/icon-delete.svg" alt="Delete">
                                        </button>
                                    </form>

                                </div>
                            <?php endforeach; ?>
                            <hr>
                            <div class="d-flex justify-content-between mt-2 ">
                                <span>Subtotal</span>
                                <!-- 2 and 3 -->
                                <!-- <strong>$<?= format_price($total); ?></strong> -->
                                <strong>
                                    €&nbsp;<?= format_price($item['price']); ?>
                                </strong>
                            </div>
                            <div class="d-flex justify-content-between text-success mb-2">
                                <span>Discount (50%)</span>
                                <!-- <strong>- $<?= format_price($discount); ?></strong> -->
                                <strong class="original-price">- €&nbsp;<?= format_price($subtotal); ?></strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fs-5 mt-2">
                                <strong>Total </strong>
                                <strong>€&nbsp;<?= format_price($subtotal); ?></strong>

                                <!-- Remove the undeline
                            <strong class="original-price">$<?= format_price($subtotal); ?></strong> -->
                            </div>



                        </div>


                        <h3 class="d-flex align-items-center gap-3 my-4">Available shipping method <span
                                class="shipping-icon">!</span></h3>

                        <div class="order-wrapper">
                            <label class="delivery-option d-flex align-items-center justify-content-between">

                                <!-- Left -->
                                <div class="d-flex align-items-center gap-3">
                                    <img src="images/postnl.svg" alt="PostNL" class="delivery-logo" />
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold">PostNL Delivery</span>
                                        <small class="text-muted">1–3 day delivery</small>
                                    </div>
                                </div>

                                <!-- Right -->
                                <div class="d-flex align-items-center gap-2">
                                    <strong>Free</strong>
                                    <input type="radio" name="delivery" checked>
                                </div>

                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 payment-bg py-5">


                    <div class="p-5">
                        <h3>Order Summary</h3>
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <span>Subtotal</span>
                            <!-- <span>€&nbsp;<?= format_price($total); ?></span> -->
                            <strong>
                                €&nbsp;<?= format_price($item['final_price']); ?> × <?= $item['quantity']; ?>
                            </strong>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="mb-2">Verzending (Shipping)</span>
                            <span class="text-success">Free</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fs-5 mt-3">
                            <strong>Total</strong>
                            <strong>€&nbsp;<?= format_price($subtotal); ?></strong>
                        </div>

                    </div>
                    <div class=" p-5">
                        <h4 class="mt-5 mb-3 ">Payment Method</h4>
                        <span>We accept</span>

                        <label class="payment-option d-flex align-items-center justify-content-between my-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/mastercard.svg" width="40">
                                <span>Credit / Debit Card</span>
                            </div>
                            <input type="radio" name="payment" checked>
                        </label>

                        <label class="payment-option d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="images/paypal.svg" width="40">
                                <span>PayPal</span>
                            </div>
                            <input type="radio" name="payment">
                        </label>

                  

                        <a href="login.php" class="add-to-cart-btn w-100 mt-4 text-center d-block">
                            Pay € <?= format_price($subtotal); ?>
                        </a>
                    </div>
                </div>

            </div>


        <?php else: ?>
            <div class="d-flex align-items-center justify-content-between flex-column">

                <img src="images/empty-cart.webp" alt="Empty-cart">
                <h1 class="text-center mt-5">Your cart is empty</h1>
            </div>
        <?php endif; ?>



    </div>

</body>
<footer>
    <script src="/schoenen/script.js"></script>
</footer>

</html>