@extends('layouts.master')

@section('title', $configLocalization->title)
@section('meta-description', $configLocalization->description)

@section('header-content')
    <div class="header__title-block">
        <div class="header__title title">
            <div id="header-clip" class="clip"></div>
            <h1>{{ $configLocalization->h1 }}</h1>
        </div>
        <style>#header-clip:after {content: '{{ $configLocalization->h1 }}';}</style>
    </div>
    <div class="header__content">
        @foreach ($technologies as $technology)
            <div class="header__item header__item-wordpress">
                <img src="{{ $technology->logo }}" alt="{{ $technology->name }}">
                <span style="color: {{ $technology->color }}">{{ $technology->name }}</span>
            </div>
        @endforeach
    </div>
    <a href="#portfolio" class="header__nav-button nav-button">
        <span>{{ __('main.nav_portfolio') }}</span>
        <div class="icon">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27 22.604v-6.562l-10.208 7.291-10.209-7.291v6.562l10.209 7.292L27 22.604z" fill="currentColor"/>
                <path d="M27 12.396V5.833l-10.208 7.292L6.583 5.833v6.563l10.209 7.291L27 12.396z" fill="currentColor"/>
            </svg>
        </div>
    </a>
@endsection

@section('content')
    <main class="main">
        @include('layouts.portfolio')
        @include('layouts.services')
        @include('layouts.about')
        @include('layouts.contact')
    </main>
@endsection

@section('modal')
    @include('layouts.modal')
@endsection
