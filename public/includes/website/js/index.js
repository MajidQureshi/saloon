var swiper = new Swiper(".carousel__track-container", {
    slidesPerView: 3,
    spaceBetween: 42,
    slidesPerGroup: 3,
    loop: true,
    centerSlide: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            slidesPerGroup: 1,
        },
        520: {
            slidesPerView: 2,
            slidesPerGroup: 2,
        },
        950: {
            slidesPerView: 3,
            slidesPerGroup: 3,
        },
    },
});
