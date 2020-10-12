@foreach ($projects as $index => $project)
    <a href="#{{ $project->slug }}" class="portfolio__item project">
        {{ $project->getThumbnail($firstWithLargeThumb && $index == 0 ) }}
        <div class="project__overlay"><span>View</span></div>
    </a>
@endforeach