import Swiper from "/public/assets/js/swiper.js";

var swiper = new Swiper(".swiper", {
    spaceBetween: 5,
    centeredSlides: true,

    autoplay: {
        delay: 7000,
        disableOnInteraction: false,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
});
