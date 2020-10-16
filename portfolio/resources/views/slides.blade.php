@foreach ($projects as $project)
<div class="swiper-slide">
    <div class="modal-project">
        <div class="modal-project__title-block">
            <div class="modal-project__title">
                <span>{{ $project->localization->name }}</span>
                <div class="clip" data-project="{{ $project->id }}"></div>
                <style>
                    [data-project="{{ $project->id }}"] {
                        --modal-clip-content: "{{ $project->localization->name }}";
                    }
                </style>
            </div>
        </div>
        <div class="modal-project__body">
            <div class="modal-project__image">
                {{-- $project->getFirstMedia('images')->img('thumb-medium',['alt'=>'']) --}}
                <img data-src="{{ $project->getFirstMedia('images')->getUrl('thumb-medium') }}" src="/assets/main/img/modal/placeholder.png" class="swiper-lazy" alt="{{ $project->localization->name }}">
                <a href="{{ $project->link }}" class="modal-project__link button" target="_blank">
                    <span class="icon">
                        <img src="/assets/main/img/icons/open-in-browser.svg" alt="">
                    </span>
                    {{ __('main.button_live') }}
                </a>
            </div>
            <div class="modal-project__content">
                <div class="modal-project__info-block">
                    <div class="modal-project__text">
                        <p>{{ $project->localization->description }}</p>
                    </div>
                    <div class="modal-project__technologies">
                        @foreach ($project->technologies as $technology)
                            <div class="modal-project__technology">
                                <img src="{{ $technology->logo }}" alt="{{ $technology->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endforeach