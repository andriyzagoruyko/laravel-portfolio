<nav class="content__block content__tabs tabs">
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="tabs__item @localeactive($localeCode)">
            <a href="{{ route('admin.locale', $localeCode) }}">{{ mb_strtoupper($localeCode ) }}</a></li>
        </li>
        @endforeach
    </ul>
</nav>