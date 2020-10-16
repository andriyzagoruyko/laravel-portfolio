<section id="about" class="section section-about">
    <h2 class="section__title title">{{ __('main.title_about') }}</h2>
    <div class="section__body ">
        <div class="section__content about">
            <div class="about__me">
                <img src="/assets/main/img/about/me.png" alt="">
                <div class="about__name">{{ $infoLocalization->name }}</div>
                <div class="about__text">
                    {{ $infoLocalization->about }}
                </div>
            </div>
        </div>
    </div>
</section>