new Swiper(".hero-swiper", {
  effect: "fade",
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  lazyLoading: true,
  loop: true,
});

new Swiper(".news-swiper", {
    slidesPerView: 3,
    spaceBetween: 50,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  