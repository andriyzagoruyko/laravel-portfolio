<div class="single-project">
    <div class="single-project__title-block">
        <div class="single-project__title">
            <span>{{ $project->localization->name }}</span>
            <div class="clip" data-project="{{ $project->id }}"></div>
            <style>
                [data-project="{{ $project->id }}"] {
                    --modal-clip-content: "{{ $project->localization->name }}";
                }
            </style>
        </div>
    </div>
    <div class="single-project__body">
        <div class="single-project__image">
            @isset($swiper)
                <img 
                    data-src="{{ $project->getFirstMedia('images')->getUrl('thumb-medium') }}" 
                    src="/assets/main/img/modal/placeholder.png" 
                    class="swiper-lazy" 
                    alt="{{ $project->localization->name }}
                ">
            @else
                <img 
                    src="{{ $project->getFirstMedia('images')->getUrl('thumb-medium') }}"
                    alt="{{ $project->localization->name }}">
            @endisset
            <a href="{{ $project->link }}" class="single-project__link button" target="_blank">
                <span class="icon">
                    <img src="/assets/main/img/icons/open-in-browser.svg" alt="">
                </span>
                {{ __('main.button_live') }}
            </a>
        </div>
        <div class="single-project__content">
            <div class="single-project__info-block">
                <div class="single-project__text">
                    {!! strip_tags($project->localization->description , '<b><a><p><br>') !!}
                </div>
                <div class="single-project__technologies">
                    @foreach ($project->technologies as $technology)
                        <div class="single-project__technology">
                            <img src="{{ $technology->logo }}" alt="{{ $technology->name }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>