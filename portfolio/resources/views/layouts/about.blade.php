<section id="about" class="section section-about fixed-bg">
    <h2 class="section__title title">{{ __('main.title_about') }}</h2>
    <div class="section__body ">
        <div class="section__content about">
            <div class="about__me">
                <div class="about__image">
                    {{ $info->getThumbnail($info->localization->name) }}
                </div>
                <div class="about__name">{{ $info->localization->name }}</div>
                <div class="about__text">
                    {!! strip_tags($info->localization->about, '<b><a><p><br>') !!}
                </div>
            </div>
        </div>
    </div>
</section>