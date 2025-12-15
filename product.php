<?php
// Template Name: Product Page

?>
<div class="container product-page">
  <div class="row">
    <div class="col-12 col-md-5 col-lg-4 offset-lg-1 ">
      <!-- Main Gallery (on page) -->
      <!-- <div class="gallery-container">
        <div class="main-gallery swiper mainSwiperPage">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/image-product-1.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-2.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-3.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-4.jpg" /></div>
               Custom Next/Prev Buttons
            <div class="swiper-button-prev d-lg-none d-flex">
              <img src="images/icon-previous.svg" />
            </div>

            <div class="swiper-button-next d-lg-none d-flex">
              <img src="images/icon-next.svg" />
            </div>
          </div>
        </div>

        <div class="thumb-gallery swiper thumbSwiperPage d-none d-lg-block">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/image-product-1-thumbnail.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-2-thumbnail.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-3-thumbnail.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-4-thumbnail.jpg" /></div>
          </div>
        </div>
      </div> -->

      <div class="gallery-container">
  <div class="main-gallery swiper mainSwiperPage">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="images/image-product-1.jpg" /></div>
      <div class="swiper-slide"><img src="images/image-product-2.jpg" /></div>
      <div class="swiper-slide"><img src="images/image-product-3.jpg" /></div>
      <div class="swiper-slide"><img src="images/image-product-4.jpg" /></div>
    </div>

    <!-- Navigation (mobile only) -->
    <div class="swiper-button-prev d-lg-none">
       <img src="images/icon-previous.svg" />
    </div>
    <div class="swiper-button-next d-lg-none">
       <img src="images/icon-next.svg" />
    </div>
  </div>

  <!-- Thumbnails (desktop only) -->
  <div class="thumb-gallery swiper thumbSwiperPage d-none d-lg-block">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="images/image-product-1-thumbnail.jpg" /></div>
      <div class="swiper-slide"><img src="images/image-product-2-thumbnail.jpg" /></div>
      <div class="swiper-slide"><img src="images/image-product-3-thumbnail.jpg" /></div>
      <div class="swiper-slide"><img src="images/image-product-4-thumbnail.jpg" /></div>
    </div>
  </div>
</div>

      <!-- Lightbox Modal -->
      <div class="lightbox-overlay  ">
        <div class="lightbox">
          <button class="close-btn">
            ×
          </button>

          <!-- Main Image Swiper in Lightbox -->
          <div class="swiper mainSwiperLightbox">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="images/image-product-1.jpg" /></div>
              <div class="swiper-slide"><img src="images/image-product-2.jpg" /></div>
              <div class="swiper-slide"><img src="images/image-product-3.jpg" /></div>
              <div class="swiper-slide"><img src="images/image-product-4.jpg" /></div>
            </div>

            <!-- Custom Next/Prev Buttons -->
            <div class="swiper-button-prev">
              <img src="images/icon-previous.svg" />
            </div>

            <div class="swiper-button-next">
              <img src="images/icon-next.svg" />
            </div>

          </div>

          <!-- Thumbnails in Lightbox -->
          <div class="swiper thumbSwiperLightbox">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="images/image-product-1-thumbnail.jpg" /></div>
              <div class="swiper-slide"><img src="images/image-product-2-thumbnail.jpg" /></div>
              <div class="swiper-slide"><img src="images/image-product-3-thumbnail.jpg" /></div>
              <div class="swiper-slide"><img src="images/image-product-4-thumbnail.jpg" /></div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <!-- Text col -->
    <div class="col-12  col-md-5 offset-md-1 col-lg-5 my-auto  py-4 px-4 px-lg-0">
      <span class="sub-title">Sneaker Company</span>
      <h1>Fall Limited Edition Sneakers</h1>
      <p>
        These low-profile sneakers are your perfect casual wear companion. Featuring a
        durable rubber outer sole, they’ll withstand everything the weather can offer.</p>

      <div
        class="price-section d-flex flex-row flex-md-column align-items-center justify-content-between align-items-md-start justify-content-md-start ">
        <span class="d-flex align-items-center gap-3 mb-1">
          <span class="current-price">$125.00</span>
          <span class="discount">50%</span>
        </span>
        <span class="original-price">$250.00</span>
      </div>


      <form data-quantity-form method="post" action="add-to-cart.php"
        class="quantity-addcart d-flex flex-column flex-md-row align-items-center gap-3 mt-4 flex-wrap">

        <!-- Product info -->
        <input type="hidden" name="product_id" value="1">
        <input type="hidden" name="product_image" value="images/image-product-1.jpg">
        <input type="hidden" name="product_name" value="Fall Limited Edition Sneakers">
        <input type="hidden" name="price" value="125.00">

        <!-- Quantity -->
        <span class="qty-box  d-flex align-items-center justify-content-between">
          <img src="images/icon-minus.svg" class="qty-btn minus" />

          <!-- If in cart -->
          <?php
          $quantityInCart = 0;
          if (isset($_SESSION['cart'][1])) {
            $quantityInCart = $_SESSION['cart'][1]['quantity'];
          }
          ?>
          <input type="number" id="qtyInput" name="quantity" value="<?= $quantityInCart ?>" min="0" />

          <img src="images/icon-plus.svg" class="qty-btn plus" />
        </span>

        <?php
        $buttonText = $quantityInCart > 0 ? "Update Cart" : "Add to Cart";
        ?>
        <!-- Add Button -->
        <button type="submit" class="add-to-cart-btn ">
          <span class="d-flex align-items-center gap-3 justify-content-center">
            <img src="images/icon-cart.svg" alt="Cart Icon" class="cart-icon">
            <?= $buttonText; ?>
          </span>
        </button>
      </form>



    </div>
  </div>
</div>