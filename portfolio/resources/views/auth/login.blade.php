<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/admin/css/style.css"> 
	<script src="assets/admin/js/script.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="page">
        <main class="main">
            <div class="container container-login">
                <div class="content">
                    <section class="content__block content__section section">
                            <div class="section__header section__header-text-center">
                                <div class="container-login__logo logo">
                                    <div class="logo__img"><img src="assets/admin/img/logo.svg" alt=""></div>
                                    <span class="logo__label">Portfolio</span>
                                </div>
                                <h2>{{ __('Login') }}</h2>
                            </div>
                            <div class="section__body">
                                <form method="POST" action="{{ route('login') }}" class="form">
                                    @csrf
                                    <div class="form__group">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                name="email" value="{{ old('email') }}" 
                                                required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form__group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" 
                                                class="form-control @error('password') is-invalid @enderror" 
                                                name="password" value="{{ old('password') }}" 
                                                required autocomplete="password" autofocus>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form__group">
                                        <label class="form-check-label" for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-success form__submit"> {{ __('Login') }}</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

