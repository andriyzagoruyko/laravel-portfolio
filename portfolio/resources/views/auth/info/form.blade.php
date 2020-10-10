@extends('auth.layouts.master')

@section('content')

@include('auth.layouts.lang-tabs')

<section class="content__block content__section section">
    <div class="section__header"><h2>Інформація та контакти</h2></div>
    <div class="section__body">
        <form method="POST" enctype="multipart/form-data"
                action="{{ route('info.update', $info->id) }}" 
            class="form"
        >
            @method('PUT')
            @csrf
            <input type="hidden" name="lang" id="lang" value={{ $locale }}>
            <div class="form__group">
                <label for="name">Ім'я</label>
                <input type="text" name="name" id="name" value="{{ $localization->name }}">
            </div>
            <div class="form__group">
                <label for="about">Про мене</label>
                <textarea name="about" id="about" cols="30" rows="10">{{ $localization->about }}</textarea>
            </div>
            <div class="form__group form__group-row">
                <label for="photo">Фото</label>
                <input type="file" name="photo" id="photo">
            </div>

            <div class="form__group">
                <label for="contact">Контакти</label>
                <textarea name="contact" id="contact" cols="30" rows="10">{{ $localization->contact }}</textarea>
            </div>
            <div class="form__group">
                <label for="mail">Почта</label>
                <input type="text" name="mail" id="mail" value="{{ $info->mail }}">
            </div>
            <div class="form__group">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" id="phone" value="{{ $info->phone }}">
            </div>
            <div class="form__group">
                <label for="telegram">Telegram</label>
                <input type="text" name="telegram" id="telegram" value="{{ $info->telegram }}">
            </div>
            <div class="form__group">
                <label for="linkedin">Linkedin</label>
                <input type="text" name="linkedin" id="linkedin" value="{{ $info->linkedin }}">
            </div>
            <div class="form__group">
                <label for="linkedin">Behance</label>
                <input type="text" name="behance" id="behance" value="{{ $info->behance }}">
            </div>
            <div class="form__group">
                <label for="github">Github</label>
                <input type="text" name="github" id="github" value="{{ $info->github }}">
            </div>
            <div class="form__group form__group-row">
                <button type="submit" class="btn btn-success form__submit">Зберегти </button>
            </div>
        </form>
    </div>
</section>
@endsection
