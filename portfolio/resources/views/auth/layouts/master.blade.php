<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/admin/css/style.css"> 
	<script src="/assets/admin/js/script.js"></script>
    <title>@yield('title')</title>
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
                            <li class="navigation__item is-active">
                                <a href="{{ route('admin.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/settings.svg" alt=""></div> 
                                    <span class="navigation__label">Налаштування</span>
                                </a>
                            </li>
                            <li class="navigation__item">
                                <a href="{{ route('projects.index') }}"><div class="icon">
                                    <img src="/assets/admin/img/icons/portfolio.svg" alt=""></div>
                                    <span class="navigation__label">Портфоліо</span> 
                                </a>
                            </li>
                            <li class="navigation__item">
                                <a href="#">
                                    <div class="icon"><img src="/assets/admin/img/icons/lang.svg" alt=""></div> 
                                    <span class="navigation__label">Локалізація</span> 
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
                <div class="header__controll"><a href="{{ route('admin.logout') }}">admin (вийти)</a></div>
            </header>
            <div class="container ">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>