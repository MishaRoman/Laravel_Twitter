<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
     crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
<div class="container row">
    <header class="header">
        <h1 class="visually-hidden">Твиттер</h1>
        <nav class="header__navigation">
            <ul>
                <li>
                    <a href="/" class="header__link header__link_main"></a>
                </li>
                <li>
                    @guest
                        <button class="header__link header__link_profile_fill" title="Авторизоваться"></button>
                    @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="header__link header__link_exit" title="Выйти"></button>
                        </form>
                    @endguest
                </li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <section class="wrapper">
            <div class="main-header">
                <a href="/" class="header__link header__link_home" title="Лента"></a>
                <a href="#" class="header__link header__link_profile" title="Твиты пользователя"></a>
                <a href="#" class="header__link header__link_likes" title="Понравившиеся твиты"></a>
                <a href="#" class="header__link header__link_sort" title="Сортировать"></a>
            </div>
        </section>

        <section class="wrapper">
            @yield('content')
        </section>

    </main>
</div>
<div class="modal overlay">
    <div class="container modal__body" id="login-modal">
        <div class="modal-close">
            <button class="modal-close__btn chest-icon"></button>
        </div>
        <section class="wrapper">
            <h2 class="tweet-form__title">Введите email и пароль</h2>
            <div class="tweet-form__error">Что-то пошло не так</div>
            <div class="tweet-form__subtitle">Если у вас нет логина, пройдите <a href="{{ route('register') }}">регистрацию</a></div>
            <form class="tweet-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="tweet-form__wrapper_inputs">

                    <input id="email" type="email" class="tweet-form__input @error('email') is-invalid @enderror" placeholder="Email" required
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" class="tweet-form__input @error('password') is-invalid @enderror" placeholder="Пароль" required
                        name="password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="tweet-form__btns_center">
                    <button class="tweet-form__btn_center" type="submit">Войти</button>
                </div>
            </form>
        </section>
    </div>
</div>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
