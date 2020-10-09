@extends('auth.layouts.master')

@section('content')

@include('auth.layouts.lang-tabs')

<section class="content__block content__section section">
    @isset($tag)
        <div class="section__header"><h2>Редагування тега</h2></div>
    @else
        <div class="section__header"><h2>Додати тег</h2></div>
    @endisset

    <div class="section__body">
        <form method="POST" enctype="multipart/form-data"
            @isset($tag) 
                action="{{ route('tags.update', $tag->id) }}" 
            @else
                action="{{ route('tags.store') }}" 
            @endisset
            class="form"
        >
            @isset($tag)
                @method('PUT')
            @endisset
            @csrf
            <input type="hidden" name="lang" id="lang" value={{ $locale }}>

            <div class="form__group">
                <label for="name">Назва</label>
                <input type="text" name="name" id="name" @isset($tag) value="{{ $localization->name }}" @endisset>
            </div>
            <div class="form__group">
                <label for="slug">Слаг</label>
                <input type="text" name="slug" id="slug" @isset($tag) value="{{ $tag->slug }}" @endisset>
            </div>
            <div class="form__group form__group-row">
                <button type="submit" class="btn btn-success form__submit">@isset($tag) Зберегти @else Додати @endisset </button>
            </div>
        </form>
    </div>
</section>
@endsection
