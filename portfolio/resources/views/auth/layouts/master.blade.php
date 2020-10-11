<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/admin/css/style.css"> 
	<script src="/assets/admin/js/script.js"></script>
    <title>Панель управления: @yield('title')</title>
</head>
<body>
    <div class="page">
        <aside class="sidebar">
            <div class="sidebar__wrapper">
                <div class="sidebar__content">
                    <a href="{{ route('index') }}">
                        <div class="sidebar__logo logo">
                            <div class="logo__img"><img src="/assets/admin/img/logo.svg" alt=""></div>
                            <span class="logo__label">Portfolio</span>
                        </div>
                    </a>
                    <nav class="sidebar__nav navigation">
                        <ul>
                            <li class="navigation__item @navactive('config')">
                                <a href="{{ route('config.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/settings.svg" alt=""></div> 
                                    <span class="navigation__label">Налаштування</span>
                                </a>
                            </li>
                            <li class="navigation__item @navactive('projects')">
                                <a href="{{ route('projects.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/portfolio.svg" alt=""></div>
                                    <span class="navigation__label">Портфоліо</span> 
                                </a>
                            </li>
                            <li class="navigation__item @navactive('tags')">
                                <a href="{{ route('tags.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/tags.svg" alt=""></div>
                                    <span class="navigation__label">Теги</span> 
                                </a>
                            </li>
                            <li class="navigation__item @navactive('technologies')">
                                <a href="{{ route('technologies.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/techno.svg" alt=""></div>
                                    <span class="navigation__label">Технології</span> 
                                </a>
                            </li>
                            <li class="navigation__item @navactive('info')">
                                <a href="{{ route('info.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/about.svg" alt=""></div>
                                    <span class="navigation__label">Інформація</span> 
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>
        <main class="main">
            <header class="main__header header">
                <div class="header__hamburger hamburger" aria-label="menu" aria-controls="navigation">
                    <svg width="35" height="25" viewBox="0 0 35 25" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <rect width="35" height="3" rx="1.5" fill="currentColor"/>
                        <rect y="11" width="35" height="3" rx="1.5" fill="currentColor"/>
                        <rect y="22" width="35" height="3" rx="1.5" fill="currentColor"/>
                    </svg>
                </div>
                <div class="header__controll">
                    <div class="navigation__dropdown dropdown">
                        <div class="dropdown__toggle" role="button" aria-label="language">
                            <div class="icon">
                                <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.4855 0.916656C7.4355 0.916656 0.916748 7.44999 0.916748 15.5C0.916748 23.55 7.4355 30.0833 15.4855 30.0833C23.5501 30.0833 30.0834 23.55 30.0834 15.5C30.0834 7.44999 23.5501 0.916656 15.4855 0.916656ZM25.5917 9.66666H21.2897C20.8332 7.86045 20.1574 6.11692 19.2772 4.47499C21.9373 5.39083 24.1789 7.23375 25.5917 9.66666ZM15.5001 3.89166C16.7105 5.64166 17.6584 7.58124 18.2855 9.66666H12.7147C13.3417 7.58124 14.2897 5.64166 15.5001 3.89166ZM4.21258 18.4167C3.97925 17.4833 3.83341 16.5062 3.83341 15.5C3.83341 14.4937 3.97925 13.5167 4.21258 12.5833H9.14175C9.02508 13.5458 8.93758 14.5083 8.93758 15.5C8.93758 16.4917 9.02508 17.4542 9.14175 18.4167H4.21258ZM5.40841 21.3333H9.7105C10.1772 23.1562 10.848 24.9062 11.723 26.525C9.06003 25.6142 6.81692 23.7699 5.40841 21.3333ZM9.7105 9.66666H5.40841C6.81692 7.23004 9.06003 5.38582 11.723 4.47499C10.8428 6.11692 10.1669 7.86045 9.7105 9.66666ZM15.5001 27.1083C14.2897 25.3583 13.3417 23.4187 12.7147 21.3333H18.2855C17.6584 23.4187 16.7105 25.3583 15.5001 27.1083ZM18.9126 18.4167H12.0876C11.9563 17.4542 11.8542 16.4917 11.8542 15.5C11.8542 14.5083 11.9563 13.5312 12.0876 12.5833H18.9126C19.0438 13.5312 19.1459 14.5083 19.1459 15.5C19.1459 16.4917 19.0438 17.4542 18.9126 18.4167ZM19.2772 26.525C20.1522 24.9062 20.823 23.1562 21.2897 21.3333H25.5917C24.1789 23.7662 21.9373 25.6092 19.2772 26.525ZM21.8584 18.4167C21.9751 17.4542 22.0626 16.4917 22.0626 15.5C22.0626 14.5083 21.9751 13.5458 21.8584 12.5833H26.7876C27.0209 13.5167 27.1667 14.4937 27.1667 15.5C27.1667 16.5062 27.0209 17.4833 26.7876 18.4167H21.8584Z" fill="currentColor"/>
                                </svg>
                            </div> 
                            <span class="current-lang">{{  mb_strtoupper(LaravelLocalization::getCurrentLocale()) }}</span> 
                        </div>
                        <ul class="dropdown__list">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="dropdown__item">
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ mb_strtoupper($localeCode ) }} ({{ ucfirst($properties['native']) }})
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ route('admin.logout') }}">admin (вийти)</a></div>
            </header>
            <div class="container ">
                <div class="content">
                    @include('auth.layouts.message')
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>