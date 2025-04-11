document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".swiper-container", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
      delay: 4000,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const burgerButton = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".main-navigation");

  if (burgerButton && nav) {
    burgerButton.addEventListener("click", function () {
      nav.classList.toggle("menu-open");
    });
  }
});
