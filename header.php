<div class="container">
  <div class="row">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  py-4">
      <div class="container-fluid px-0">
        <a class="navbar-brand" href="#">
          <img src="images/logo.svg" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

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
          <div class="d-flex align-items-center flex-row gap-5 me-2">
            <div class="cart-wrapper">
              <img src="images/icon-cart.svg" class="cart-icon" />
              <!-- To Cart -->
              <ul class="dropdown-menu">
                <li class="dropdown-item"><strong class=" ">Cart</strong></li>
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
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                    ?>
                    <li class="dropdown-item cart-item d-flex align-items-center justify-content-between">
                      <!-- Product info -->
                      <div class="d-flex align-items-center gap-3">
                        <img src="<?= $item['image']; ?>" class="cart-thumb">
                         <!-- <img src="<?= htmlspecialchars($item['image']); ?>" class="cart-thumb"> -->
                        <div class="cart-details">
                          <div class="cart-name"><?= $item['name']; ?></div>
                          <div class="cart-price">
                            $<?= $item['price']; ?> × <?= $item['quantity']; ?>
                            <strong>$<?= $subtotal; ?>.00</strong>
                          </div>
                        </div>
                      </div>
                      <!-- Delete button -->
                      <form method="post" action="remove-from-cart.php" class="mt-3">
                        <input type="hidden" name="product_id" value="<?= $id; ?>">
                        <button type="submit" class="cart-delete">
                          <img src="images/icon-delete.svg" alt="Delete">
                        </button>
                      </form>

                    </li>
                  <?php endforeach; ?>
                  <!-- <li>
                    <hr class="dropdown-divider">
                  </li> -->
                  <li class="dropdown-item mt-4">
                    <!-- <strong>Total: $<?= $total; ?></strong> -->
                    <button type="submit" class="add-to-cart-btn w-100">
                      <span class="d-flex align-items-center justify-content-center text-center">
                       Checkout 
                       <!-- $<?= $total; ?> -->
                      </span>
                    </button>
                  </li>
                <?php endif; ?>
              </ul>
            </div>

            <img src="images/image-avatar.png" alt="User Avatar" class="user-avatar" />
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>