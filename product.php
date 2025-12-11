<?php
// Template Name: Product Page
?>
<div class="container product-page">
  <div class="row">
    <div class="col-lg-6">
      <!-- Main Gallery (on page) -->
      <div class="gallery-container">
        <div class="main-gallery swiper mainSwiperPage">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/image-product-1.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-2.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-3.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-4.jpg" /></div>
          </div>
        </div>

        <div class="thumb-gallery swiper thumbSwiperPage">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/image-product-1-thumbnail.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-2-thumbnail.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-3-thumbnail.jpg" /></div>
            <div class="swiper-slide"><img src="images/image-product-4-thumbnail.jpg" /></div>
          </div>
        </div>
      </div>

      <!-- Lightbox Modal -->
      <div class="lightbox-overlay">
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


    <div class="col-12 col-lg-5 my-auto  py-4">
      <span class="sub-title">Sneaker Company</span>
      <h1>Fall Limited Edition Sneakers</h1>
      <p>
        These low-profile sneakers are your perfect casual wear companion. Featuring a
        durable rubber outer sole, they’ll withstand everything the weather can offer.</p>

      <div class="price-section d-flex flex-row flex-md-column align-items-center justify-content-between align-items-md-start justify-content-md-start ">
        <span class="d-flex align-items-center gap-3 mb-1">
          <span class="current-price">$125.00</span>
          <span class="discount">50%</span>
        </span>
        <span class="original-price">$250.00</span>
      </div>

      <div class="quantity-addcart d-flex flex-column flex-md-row align-items-center  gap-3 mt-4">
        <!-- <input type="number" value="0" min="0" /> -->
        <span class="qty-box">
          <img src="images/icon-minus.svg" class="qty-btn minus" />

          <input type="number" id="qtyInput" value="0" min="0" />

          <img src="images/icon-plus.svg" class="qty-btn plus" />
        </span>
        <button class="add-to-cart-btn">
          <span class="d-flex align-items-center gap-3">
            <img src="images/icon-cart.svg" alt="Cart Icon" class="cart-icon">
            Add to cart
          </span>
        </button>
      </div>
    </div>
  </div>
</div>