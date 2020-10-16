@foreach ($projects as $index => $project)
    <a href="#{{ $project->slug }}" class="portfolio__item project">
        {{ $project->getThumbnail($firstWithLargeThumb && $index == 0, $project->localization->name) }}
        <div class="project__overlay"><span>{{ __('main.button_view') }}</span></div>
    </a>
@endforeach