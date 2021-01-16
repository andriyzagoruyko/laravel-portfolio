import Swiper from 'swiper/bundle';

export default () => {
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        speed: 400,
        threshold: 10,
        spaceBetween: 120,
        grabCursor: true,
        autoHeight: true,
        roundLengths: true,
        updateOnWindowResize: true,
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            init: () => document.querySelector('.modal').style.display = 'flex',
        }
    });

    swiper.on('slideChange', function () {
        setTimeout(() => swiper.updateAutoHeight(5), 200)
    });

    return swiper;
} 