@extends('auth.layouts.master')

@section('title', 'Проекти')

@section('content')
    <div class="content__block content__buttons">
        <a href="{{ route('projects.create') }}" class="btn btn-success">Додати проект</a>
        <a href="#" class="btn btn-warning">Керування тегами</a>
    </div>
    <div class="content__block content__portfolio portfolio">
        @foreach($projects as $project)
        <div class="portfolio__item project">
            <div class="project__img">
                <a href="{{ route("projects.edit", $project->id) }}">   
                    <img src="/assets/admin/img/projects/02.jpg" alt="">
                </a>
            </div>
            <div class="project__body">
                <div class="project__text">
                    <div class="project__title"><a href="{{ route("projects.edit", $project->id) }}">{{ $project->name }}</a></div>
                    <div class="project__desc">{{ $project->description }}</div>
                </div>
                
                <form action="{{ route("projects.destroy", $project->id) }}"  method="POST" class="project__buttons">
                    <a href="{{ route("projects.edit", $project->id) }}" class="btn btn-primary">
                        <div class="icon"><img src="/assets/admin/img/icons/edit.svg" alt=""></div>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <span class="icon"><img src="/assets/admin/img/icons/remove.svg" alt=""></span>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>  
@endsection