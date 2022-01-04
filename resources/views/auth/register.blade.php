@extends('layouts.layout')

@section('title', __('register.title') )

@section('content')
<section class="wrapper">
    <h2 class="tweet-form__title">{{ __('register.title') }}</h2>
    <div class="tweet-form__subtitle">{{ __('register.subtitle') }} - 
        <a href="{{ route('login') }}">{{ __('register.sign_in') }}</a>
    </div>
    <div class="tweet-form__error">{{ $errors->first() }}</div>
    <form class="tweet-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="tweet-form__wrapper_inputs">
            <input id="name" type="text" class="tweet-form__input @error('name') is-invalid @enderror"
                required placeholder="{{ __('register.name') }}" 
                name="name" value="{{ old('name') }}" autofocus>

            <input id="username" type="text" class="tweet-form__input @error('username') is-invalid @enderror"
                required placeholder="{{ __('register.nickname') }}" name="username" value="{{ old('username') }}" autofocus>

            <input id="email" type="email" class="tweet-form__input @error('email') is-invalid @enderror" placeholder="Email" 
                name="email" value="{{ old('email') }}" required>

            <input id="password" type="password" class="tweet-form__input @error('password') is-invalid @enderror"
                placeholder="{{ __('main.password') }}" required name="password">

            <input id="password-confirm" type="password" class="tweet-form__input"
                placeholder="{{ __('main.password_confirm') }}" name="password_confirmation" required>
                
        </div>
        <div class="tweet-form__btns_center">
            <button class="tweet-form__btn_center" type="submit">{{ __('main.sign_up') }}</button>
        </div>
    </form>
</section>
@endsection
