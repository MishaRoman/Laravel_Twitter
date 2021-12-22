@extends('layouts.layout')

@section('title', 'Twitter - Авторизация')

@section('content')
<section class="wrapper">
    <h2 class="tweet-form__title">Авторизация</h2>
    <div class="tweet-form__subtitle">Если у вас нет аккаунта,<a href="{{ route('register') }}"> зарегистрируйтесь</a></div>
    <div class="tweet-form__error">{{ $errors->first() }}</div>
    <form class="tweet-form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="tweet-form__wrapper_inputs">

            <input id="email" type="email" class="tweet-form__input @error('email') is-invalid @enderror" placeholder="Email" required
                name="email" value="{{ old('email') }}" required autocomplete="email">

            <input id="password" type="password" class="tweet-form__input @error('email') is-invalid @enderror" placeholder="Пароль" required
                name="password" autocomplete="new-password">

        </div>
        <div class="tweet-form__btns_center">
            <button class="tweet-form__btn_center" type="submit">Войти</button>
        </div>
    </form>
</section>
@endsection