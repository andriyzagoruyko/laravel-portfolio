@foreach ($projects as $project)
<div class="swiper-slide">
    @include('layouts.project', ['swiper' => true])
</div>   
@endforeach