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
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=cyrillic" rel="stylesheet" id="wt-sky-css--725574360">
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
                        <a href="{{ route('login') }}" class="header__link header__link_profile_fill" title="Авторизоваться"></a>
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
                <a
                @guest
                    href="{{ route('login') }}"                
                @else
                    href="{{ route('profiles.index', [Auth::user()->username]) }}"
                @endguest
                    class="header__link header__link_profile" title="Твиты пользователя"></a>
                <a href="#" class="header__link header__link_likes" title="Понравившиеся твиты"></a>
                <a href="#" class="header__link header__link_sort" title="Сортировать"></a>
            </div>
        </section>

        <section class="wrapper">
            @yield('content')
        </section>

    </main>
</div>

<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
