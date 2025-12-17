<div class="container">
  <div class="row">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  py-4">
      <div class="container-fluid px-0 flex-nowrap">
       <div class="d-flex align-items-center flex-row gap-lg-0 gap-3 ">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mb-1" href="index.php">
          <img src="images/logo.svg" alt="" />
        </a>
       </div>



        <!-- Custom offcanvas menu -->
        <div class="mobile-menu" id="mobileMenu">
          <button class="close-btn">&times;</button>
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Collections</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Men</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Women</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>
        </div>


        <!-- Lg -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Collections</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Men</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Women</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>



        <div class="d-flex align-items-center flex-row gap-lg-5 gap-3 ">
          <div class="cart-wrapper">
            <div class=" position-relative">
              <?php if ($cartCount > 0): ?>
                <span class="cart-count"><?= $cartCount; ?></span>
              <?php endif; ?>
              <img src="images/icon-cart.svg" class="cart-icon" />
            </div>
            <!-- To Cart -->
            <ul class="dropdown-menu">
              <li class="dropdown-item  pb-4"><strong class=" ">Cart</strong></li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <?php if (empty($_SESSION['cart'])): ?>
                <li><span class="dropdown-item text-center align-items-center justify-content-center mt-5">Your cart is
                    empty.</span></li>
              <?php else: ?>

                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $id => $item):

                  $price = isset($item['discount_price']) && $item['discount_price'] > 0
                    ? $item['discount_price']
                    : $item['price'];

                  // $subtotal = $price * $item['quantity'];
                  // $total += $subtotal;
                  $price = $item['final_price'];
                  $subtotal = $price * $item['quantity'];
                  $total += $subtotal;
                  // print_r($total)
                  ?>
                  <li class="dropdown-item cart-item d-flex align-items-center justify-content-between gap-3 pt-4">
                    <div class="d-flex align-items-center gap-3">
                      <img src="<?= htmlspecialchars($item['image']); ?>" class="cart-thumb">

                      <div class="cart-details">
                        <div class="cart-name"><?= htmlspecialchars($item['name']); ?></div>
                        <!-- <div class="cart-price">
                          $<?= number_format($price, 2); ?> × <?= $item['quantity']; ?>
                          <strong>$<?= number_format($subtotal, 2); ?></strong>
                        </div> -->
                        <div class="cart-price">
                         €&nbsp;<?= number_format($price, 2); ?> × <?= $item['quantity']; ?>
                          <strong>€&nbsp;<?= number_format($subtotal, 2); ?></strong>
                        </div>
                      </div>
                    </div>

                    <form method="post" action="remove-from-cart.php">
                      <input type="hidden" name="product_id" value="<?= $id; ?>">
                      <button type="submit" class="cart-delete">
                        <img src="images/icon-delete.svg" alt="Delete">
                      </button>
                    </form>
                  </li>
                <?php endforeach; ?>
                <li class="dropdown-item mt-4">
                  <!-- <strong>Total: $<?= $total; ?></strong> -->
                  <!-- <button type="submit" class="add-to-cart-btn w-100">
                    <span class="d-flex align-items-center justify-content-center text-center">
                      Checkout
                      $<?= $total; ?>
                    </span>
                  </button> -->


                  <a href="check-out.php" class="add-to-cart-btn w-100 text-center d-block ">
                    Checkout
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </div>


          <img src="images/image-avatar.png" alt="User Avatar" class="user-avatar" />
        </div>




      </div>
    </nav>


  </div>
</div>