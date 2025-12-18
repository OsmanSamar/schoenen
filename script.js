// To open menu on mobile

document.addEventListener("DOMContentLoaded", function () {
  const toggler = document.querySelector(".navbar-toggler");
  const mobileMenu = document.getElementById("mobileMenu");
  const mobilecloseBtn = mobileMenu.querySelector(".close-btn");

  toggler.addEventListener("click", () => {
    mobileMenu.classList.add("open");
  });

  mobilecloseBtn.addEventListener("click", () => {
    mobileMenu.classList.remove("open");
  });

  // Optional: close when clicking outside
  document.addEventListener("click", (e) => {
    if (!mobileMenu.contains(e.target) && !toggler.contains(e.target)) {
      mobileMenu.classList.remove("open");
    }
  });
});

// To open dropmenu
const cartWrapper = document.querySelector(".cart-wrapper");
console.log(cartWrapper);
cartWrapper.addEventListener("click", () => {
  cartWrapper.classList.toggle("open");
});

// Quantity Selector
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
// const thumbSwiperPage = new Swiper(".thumbSwiperPage", {
//   spaceBetween: 10,
//   slidesPerView: 4,
//   freeMode: true,
//   watchSlidesProgress: true,
// });

// const mainSwiperPage = new Swiper(".mainSwiperPage", {
//   spaceBetween: 10,
//   thumbs: {
//     swiper: thumbSwiperPage,
//   },
// });

window.addEventListener("load", initThumbSwiper);
window.addEventListener("resize", initThumbSwiper);

// On Sm Screens, disable thumbs functionality
const mainSwiperPage = new Swiper(".mainSwiperPage", {
  spaceBetween: 10,
  slidesPerView: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// On LG Screens, enable thumbs functionality

let thumbSwiperPage = null;

function initThumbSwiper() {
  if (window.innerWidth >= 992 && !thumbSwiperPage) {
    thumbSwiperPage = new Swiper(".thumbSwiperPage", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });

    mainSwiperPage.thumbs.swiper = thumbSwiperPage;
    mainSwiperPage.thumbs.init();
    mainSwiperPage.thumbs.update();
  }

  if (window.innerWidth < 992 && thumbSwiperPage) {
    thumbSwiperPage.destroy(true, true);
    thumbSwiperPage = null;
  }
}

//
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
const lightboxCloseBtn = document.querySelector(".lightbox-overlay .close-btn");
const pageThumbs = document.querySelectorAll(".main-gallery .swiper-slide img");

pageThumbs.forEach((thumb, index) => {
  thumb.addEventListener("click", () => {
    overlay.style.display = "flex";
    mainSwiperLightbox.slideTo(index, 0);
  });
});

// Close Lightbox
lightboxCloseBtn.addEventListener("click", () => (overlay.style.display = "none"));
overlay.addEventListener("click", (e) => {
  if (e.target === overlay) overlay.style.display = "none";
});

document.querySelectorAll(".quantity-addcart").forEach(x=>{
  let form = x;
  form.addEventListener('submit',(e)=>{
    e.preventDefault();
    let data= new FormData(form);
    fetch('/schoenen/add-to-cart.php',{
      method:"POST",
      body:data
    }).then(res=>res.json()).then(data=>{
      console.log(data)
    })
  })
})