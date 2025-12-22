<?php
include 'imports.php';
require_once('./products_data.php');
// Template Name: Products Page
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
                $product_id = $product['id'];
                                
                $discounts = get_discounts($product_id, true);
                $final_price = $discounts['final_price'];
                $discountPercent = $discounts['discount_percentage'];

                $original_prices = get_original_price($product_id);
                $original_price_formatted = $original_prices['original_price_formatted'];
                $original_price = $original_prices['original_price'];
                ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <a href="single-product.php?id=<?= $product['id']; ?>">
                        <div class="product-card">
                            <figure>
                                <img src="<?= $product['image_path']; ?>" alt="<?= htmlspecialchars($product['name']); ?>"
                                    class="">

                                <!-- Overlay -->
                                <figcaption>

                                    <h5><?= htmlspecialchars($product['details']); ?></h5>


                                </figcaption>
                            </figure>

                        </div>
                        <h5 class="my-3"><?= htmlspecialchars($product['name']); ?></h5>

                        <p class="mb-2 korting-wrap ">
                            
                            € <?php echo $final_price; ?>
                        </p>
                        <span class="korting">Korting</span>
                        <br />
                        <?php if ($discountPercent > 0): ?>
                            <p class="old-price ms-0 mt-2">
                                
                                € <?php echo $original_price_formatted; ?>
                            </p>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>