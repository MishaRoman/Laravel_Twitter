@extends('layouts.layout')

@section('title', __('login.title') )

@section('content')
<section class="wrapper">
    <h2 class="tweet-form__title">{{ __('login.title') }}</h2>
    <div class="tweet-form__subtitle">{{ __('login.subtitle') }},
        <a href="{{ route('register') }}"> {{ __('login.sign_up') }}</a>
    </div>
    <div class="tweet-form__error">{{ $errors->first() }}</div>
    <form class="tweet-form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="tweet-form__wrapper_inputs">

            <input id="email" type="email" class="tweet-form__input @error('email') is-invalid @enderror" placeholder="Email" required
                name="email" value="{{ old('email') }}" required autocomplete="email">

            <input id="password" type="password" class="tweet-form__input @error('email') is-invalid @enderror"
                placeholder="{{ __('main.password') }}" required name="password" autocomplete="password">

        </div>
        <div class="tweet-form__btns_center">
            <button class="tweet-form__btn_center" type="submit">{{ __('login.sign_in') }}</button>
        </div>
    </form>
</section>
@endsection