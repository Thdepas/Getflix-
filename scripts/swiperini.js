var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    slidesPerGroup: 2,
    spaceBetween: 15,
    grabCursor: true,
    loop: true,
    /*effect: 'coverflow',
    coverflowEffect: {
        rotate: 50,
        slideShadows: false,
        stretch: 0,
        depth: 5,
        modifier: 1,
      },*/
    //freeMode: true,
    /*pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },*/
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        375: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 15,
        },
        540: {
            slidesPerView: 2,
            slidesPerGroup: 1,
            spaceBetween: 15,
        },
        720: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        1080: {
            slidesPerView: 6,
            spaceBetween: 15,
        }
    }
});