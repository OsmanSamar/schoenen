<?php
session_start();
$cartCount = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <link rel="stylesheet" href="/schoenen/styles/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body class="check-out">

    <div class="container">
        <div class="row  check-wrapper mt-5 ">
            <hr class="mt-5">

            <div class="col-12 col-lg-6 py-5">
                <div class=" p-5">
                    <h2>Order Summary</h2>
                    <p>This is the check out page content.</p>

                    <div class="order-wrapper">
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $item):
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                            ?>
                            <div class="d-flex align-items-center mb-3 gap-3">
                                <img src="<?= $item['image']; ?>" width="60" class="rounded">

                                <div class="flex-grow-1">
                                    <div><?= $item['name']; ?></div>
                                    <small>
                                        $<?= $item['price']; ?> × <?= $item['quantity']; ?>
                                    </small>
                                </div>

                                <strong>$<?= $subtotal; ?></strong>
                            </div>
                        <?php endforeach; ?>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <strong>Total</strong>
                            <strong>$<?= $total; ?></strong>
                        </div>
                    </div>
                    <h3 class="d-flex align-items-center gap-3 my-4">Available shipping method <span
                            class="shipping-icon">!</span></h3>
                    <!-- <div class="order-wrapper">
                       <div class="d-flex flex-row align-items-center justify-content-between">
                       <div class="d-flex flex-row align-items-center gap-3">
                          <img src="" alt="">
                        <div class="d-flex flex-column gap-2">
                            <span> PostNl Delivery </span>
                            <span>3-4 day Delivery</span>
                        </div>
                       </div>
                        <strong class="d-flex align-items-center gap-2 ">
                            <span></span>
                           <span>Free</span>
                        </strong>
                       </div>
                    </div> -->
                    <div class="order-wrapper">
                        <label class="delivery-option d-flex align-items-center justify-content-between">

                            <!-- Left -->
                            <div class="d-flex align-items-center gap-3">
                                 <img src="images/postnl.svg"  alt="PostNL" class="delivery-logo" />
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold">PostNL Delivery</span>
                                    <small class="text-muted">3–4 day delivery</small>
                                </div>
                            </div>

                            <!-- Right -->
                            <div class="d-flex align-items-center gap-2">
                                <strong >Free</strong>
                                <input type="radio" name="delivery" checked>
                            </div>

                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 payment-bg py-5">
                Right col
            </div>

        </div>
    </div>

</body>

</html>