<div class="modal">
    <div class="modal__wrapper">
        <div class="modal__header">
            <div class="modal__controll">
                <button class="modal__close hamburger hamburger--spring is-active">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="modal__body">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @include('slides')
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>