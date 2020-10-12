@foreach ($projects as $index => $project)
    @include('layouts.project-card', [
        'project' => $project,
        'bigThumbnail' => $largeThumbnail && $index == 0 
    ])
@endforeach