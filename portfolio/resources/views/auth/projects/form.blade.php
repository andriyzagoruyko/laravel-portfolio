@extends('auth.layouts.master')

@section('content')

@include('auth.layouts.lang-tabs')

<section class="content__block content__section section">
    @isset($project)
        <div class="section__header"><h2>Редагування проекта</h2></div>
    @else
        <div class="section__header"><h2>Додати проект</h2></div>
    @endisset

    <div class="section__body">
        <form method="POST" enctype="multipart/form-data"
            @isset($project) 
                action="{{ route('projects.update', $project->id) }}" 
            @else
                action="{{ route('projects.store') }}" 
            @endisset
            class="form"
        >
            @isset($project)
                @method('PUT')
                <input type="hidden" name="lang" id="lang" value={{ $locale }}>
            @endisset
            @csrf
            <div class="form__group">
                <label for="name">Назва</label>
                <input type="text" name="name" id="name" @isset($project) value="{{ $localization->name }}" @endisset>
            </div>
            <div class="form__group">
                <label for="slug">Слаг</label>
                <input type="text" name="slug" id="slug" @isset($project) value="{{ $project->slug }}" @endisset>
            </div>
            <div class="form__group">
                <label for="link">Посилання на сайт</label>
                <input type="text" name="link" id="link" @isset($project) value="{{ $project->link }}" @endisset>
            </div>
            <div class="form__group">
                <label for="description">Опис</label>
                <textarea name="description" id="description" cols="30" rows="10">@isset($project) {{ $localization->description }} @endisset</textarea>
            </div>
            @if($tags->count())
                <div class="form__group form__group-row">
                    <label for="image">Тег</label>
                    <select name="tag_id" id="tag_id">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                @if(isset($project) && $project->tag_id === $tag->id) 
                                    selected 
                                @endif>
                                {{ $tag->defaultLocalization->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if(!is_null($technologies) && $technologies->count())
                <div class="form__group">
                    <label for="image">Технології</label>
                    <select name="technology_ids[]" id="technology_ids" multiple>
                        @foreach ($technologies as $technology)
                            <option value="{{ $technology->id }}" 
                                    @if(isset($project) && $project->technologies->contains($technology->id)) 
                                        selected 
                                    @endif>
                                    {{ $technology->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form__group form__group-row">
                <label for="image">Зображенния</label>
                <input type="file" name="image" id="image">
            </div>

            <div class="form__group form__group-row">
                <button type="submit" class="btn btn-success form__submit">@isset($project) Зберегти @else Додати @endisset </button>
            </div>
        </form>
    </div>
</section>
@endsection
