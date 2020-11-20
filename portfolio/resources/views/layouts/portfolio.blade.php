<section id="portfolio" class="section">
    <h2 class="section__title title">{{ __('main.title_portfolio') }}</h2>
    <div class="section__body container">
        <nav class="section__tabs tabs">
            <ul>
                @foreach ($tags as $tag)
                    @if ($loop->first)
                        <li class="tabs__item @empty($mainTag) is-active @endempty" data-tag data-name="/"><a href="/#portfolio">{{ __('main.tabs_all') }}</a></li>
                    @endif

                    <li class="tabs__item 
                        @if(!empty($mainTag) && $mainTag->id == $tag->id) is-active @endif"
                        data-tag="{{ $tag->id }}"
                        data-name="{{ $tag->slug }}"
                    >
                        <a href="{{ route('index', $tag->slug) }}#portfolio">{{  $tag->localization->name }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="section__content portfolio">

            @include('layouts.projects', [
                'firstWithLargeThumb' => true
            ])

            <div class="portfolio__item portfolio__item-loadmore @if($maxPages <= 1) is-hidden @endif" 
                id="loadmore" 
                data-tag="{{ empty($mainTag->id) ? '' : $mainTag->id }}"
                data-page ="1"
                >
                <button class="portfolio__button nav-button">
                    <span class="text">{{ __('main.button_more') }}</span>
                    <span class="loading">{{ __('main.button_loading') }}</span>
                    <span class="icon">
                        <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.4999 6.99414C10.2083 6.99414 3.98117 11.5216 1.45825 17.9126C3.98117 24.3035 10.2083 28.831 17.4999 28.831C24.7916 28.831 31.0187 24.3035 33.5416 17.9126C31.0187 11.5216 24.7916 6.99414 17.4999 6.99414ZM17.4999 25.1915C13.4749 25.1915 10.2083 21.9305 10.2083 17.9126C10.2083 13.8946 13.4749 10.6336 17.4999 10.6336C21.5249 10.6336 24.7916 13.8946 24.7916 17.9126C24.7916 21.9305 21.5249 25.1915 17.4999 25.1915ZM17.4999 13.5452C15.0791 13.5452 13.1249 15.496 13.1249 17.9126C13.1249 20.3292 15.0791 22.2799 17.4999 22.2799C19.9208 22.2799 21.8749 20.3292 21.8749 17.9126C21.8749 15.496 19.9208 13.5452 17.4999 13.5452Z" fill="currentColor"/>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>