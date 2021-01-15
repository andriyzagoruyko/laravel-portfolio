import Swiper from 'swiper/bundle';

export default () =>{
    return new Swiper('.swiper-container', {
        slidesPerView: 1,
        speed: 400,
        threshold: 6,
        spaceBetween: 120,
        grabCursor: true,
        autoHeight: true,
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
} 