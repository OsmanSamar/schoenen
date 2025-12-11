<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="/schoenen/styles/style.css" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght,YOPQ@100..900,300&family=Rasa:ital,wght@0,300..700;1,300..700&display=swap"
    rel="stylesheet" />

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <title>Frontend Mentor | E-commerce product page</title>

 
</head>

<body>
  <?php include 'header.php'; ?>
  <?php include 'product.php'; ?>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->


  <script>
    const minusBtn = document.querySelector(".minus");
    const plusBtn = document.querySelector(".plus");
    const qtyInput = document.getElementById("qtyInput");

    plusBtn.addEventListener("click", () => {
      qtyInput.value = parseInt(qtyInput.value) + 1;
    });

    minusBtn.addEventListener("click", () => {
      const current = parseInt(qtyInput.value);
      if (current > 0) {
        qtyInput.value = current - 1;
      }
    });

    
    // Swiper JS for product images
    const thumbSwiperPage = new Swiper(".thumbSwiperPage", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });

    const mainSwiperPage = new Swiper(".mainSwiperPage", {
      spaceBetween: 10,
      thumbs: {
        swiper: thumbSwiperPage,
      },
    });

    //  Lightbox Swipers 
    const thumbSwiperLightbox = new Swiper(".thumbSwiperLightbox", {
      spaceBetween: 15,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });

    const mainSwiperLightbox = new Swiper(".mainSwiperLightbox", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: thumbSwiperLightbox,
      },
    });

    // Open Lightbox 
    const overlay = document.querySelector(".lightbox-overlay");
    const closeBtn = document.querySelector(".close-btn");
    const pageThumbs = document.querySelectorAll(".main-gallery .swiper-slide img");

    pageThumbs.forEach((thumb, index) => {
      thumb.addEventListener("click", () => {
        overlay.style.display = "flex";
        mainSwiperLightbox.slideTo(index, 0);
      });
    });

    // Close Lightbox 
    closeBtn.addEventListener("click", () => overlay.style.display = "none");
    overlay.addEventListener("click", e => {
      if (e.target === overlay) overlay.style.display = "none";
    });


  </script>
</body>

</html>