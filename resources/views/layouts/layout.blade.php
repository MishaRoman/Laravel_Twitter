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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
<div class="container row" id="app">
    <header class="header">
        <h1 class="visually-hidden">{{ __('main.app_name') }}</h1>
        <nav class="header__navigation">
            <ul>
                <li>
                    <a href="/" class="header__link header__link_main"></a>
                </li>
                <li>
                    @guest
                        <a href="{{ route('login') }}" class="header__link header__link_profile_fill"
                            title="{{ __('main.sign_in') }}"></a>
                    @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="header__link header__link_exit" title="{{ __('main.logout') }}"></button>
                        </form>
                    @endguest
                </li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <section class="wrapper">
            <div class="main-header">
                <a href="{{ route('posts.index') }}" class="header__link header__link_home" title="{{ __('main.feed') }}"></a>
                <a
                @guest
                    href="{{ route('login') }}"                
                @else
                    href="{{ route('profiles.index', [Auth::user()->username]) }}"
                @endguest
                    class="header__link header__link_profile" title="{{ __('main.user_tweets') }}"></a>
                <a href="{{ route('liked') }}" class="header__link header__link_likes" title="{{ __('main.liked_tweets') }}"></a>
                <div class="dropdown">
                  <a class="header__link header__link_locale" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('locale', 'en') }}">en</a>
                        <a class="dropdown-item" href="{{ route('locale', 'ru') }}">ru</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="wrapper">
            @if(session()->has('warning'))
                <div class="alert alert-danger">
                    <p>{{ session()->get('warning') }}</p>
                </div>
            @elseif(session()->has('success'))
                <div class="alert alert-success">
                    <p>{{ session()->get('success') }}</p>
                </div>
            @endif
        </section>

        @yield('content')

    </main>
</div>

<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
