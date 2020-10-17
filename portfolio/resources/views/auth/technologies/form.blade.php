@extends('auth.layouts.master')

@section('content')

    <section class="content__block content__section section">
        @isset($technology)
            <div class="section__header"><h2>Редагування технології</h2></div>
        @else
            <div class="section__header"><h2>Додати технологію</h2></div>
        @endisset

        <div class="section__body">
            <form method="POST" enctype="multipart/form-data"
                @isset($technology) 
                    action="{{ route('technologies.update', $technology->id) }}" 
                @else
                    action="{{ route('technologies.store') }}" 
                @endisset
                class="form"
            >
                @isset($technology)
                    @method('PUT')
                @endisset
                @csrf
                <div class="form__group">
                    <label for="name">Назва</label>
                    <input type="text" name="name" id="name" @isset($technology) value="{{ $technology->name }}" @endisset>
                </div>
                <div class="form__group form__group-row">
                    <label for="image">Логотип</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="form__group form__group-row">
                    <input type="checkbox" name="in_header" id="in_header" @if (isset($technology) && $technology->in_header) checked @endif>
                    <label for="in_header">Показати в шапці</label>
                </div>
                <div class="form__group">
                    <label for="color">Колір тексту</label>
                    <input type="text" name="color" id="color" @isset($technology) value="{{ $technology->color }}" @endisset>
                </div>
                <div class="form__group">
                    <label for="order">Пріоритет для сортування</label>
                    <input type="text" name="order" id="order" @isset($technology) value="{{ $technology->order }}" @endisset>
                </div>
                <div class="form__group form__group-row">
                    <button type="submit" class="btn btn-success form__submit">@isset($technology) Зберегти @else Додати @endisset </button>
                </div>
            </form>
        </div>
    </section>
    
@endsection
