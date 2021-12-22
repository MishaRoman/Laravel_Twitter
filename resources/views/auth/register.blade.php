@extends('layouts.layout')

@section('title', 'Twitter - Регистрация')

@section('content')
<section class="wrapper">
    <h2 class="tweet-form__title">Регистрация</h2>
    <div class="tweet-form__subtitle">Уже есть аккаунт? - <a href="{{ route('login') }}">авторизируйтесь</a></div>
    <div class="tweet-form__error">{{ $errors->first() }}</div>
    <form class="tweet-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="tweet-form__wrapper_inputs">
            <input id="name" type="text" class="tweet-form__input @error('name') is-invalid @enderror" required placeholder="Ваше имя" 
                name="name" value="{{ old('name') }}" autofocus>

            <input id="username" type="text" class="tweet-form__input @error('username') is-invalid @enderror" required
                placeholder="Ваш уникальный никнейм" name="username"
                value="{{ old('username') }}" autofocus>

            <input id="email" type="email" class="tweet-form__input @error('email') is-invalid @enderror" placeholder="Email" 
                name="email" value="{{ old('email') }}" required>

            <input id="password" type="password" class="tweet-form__input @error('password') is-invalid @enderror" placeholder="Пароль" required
                name="password">

            <input id="password-confirm" type="password" class="tweet-form__input" placeholder="Пароль повторно"
                name="password_confirmation" required>
                
        </div>
        <div class="tweet-form__btns_center">
            <button class="tweet-form__btn_center" type="submit">Зарегистрироваться</button>
        </div>
    </form>
</section>
@endsection
