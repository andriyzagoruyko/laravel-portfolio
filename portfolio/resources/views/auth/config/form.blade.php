@extends('auth.layouts.master')

@section('content')

@include('auth.layouts.lang-tabs')
    <section class="content__block content__section section">
        <div class="section__header"><h2>Загальні налаштування</h2></div>
        <div class="section__body">
            <form method="POST" enctype="multipart/form-data"
                    action="{{ route('config.update', $config->id) }}" 
                class="form"
            >
                @method('PUT')
                @csrf
                <input type="hidden" name="lang" id="lang" value={{ $locale }}>
                <div class="form__group">
                    <label for="title">Заголовок title</label>
                    <input type="text" name="title" id="title" value="{{ $localization->title }}">
                </div>
                <div class="form__group">
                    <label for="h1">Заголовок h1</label>
                    <textarea name="h1" id="h1" cols="30" rows="10">{{ $localization->h1 }}</textarea>
                </div>
                <div class="form__group">
                    <label for="description">Мета тег description</label>
                    <textarea name="description" id="description" cols="30" rows="10">{{ $localization->description }}</textarea>
                </div>
                <div class="form__group form__group-row">
                    <button type="submit" class="btn btn-success form__submit">Зберегти </button>
                </div>
            </form>
        </div>
    </section>
@endsection
