@extends('layout')

@section('title', 'Настройки профиля')

@section('content')
    <h2 class="tweet-form__title">Настройки профиля</h2>
    <div class="tweet-form__error">{{ $errors->first() }}</div>
    <form class="tweet-form" method="POST" action="{{ route('profiles.update', [$user->id]) }}">
        @csrf
    	@method('PATCH')

        <div class="tweet-form__wrapper_inputs">
            <input id="title" type="text" class="tweet-form__input @error('title') is-invalid @enderror" placeholder="Заголовок профиля" 
                name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

            <textarea id="description" rows="6" class="tweet-form__input @error('description') is-invalid @enderror"
                placeholder="Описание" name="description"
                value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus></textarea>

            <input id="url" type="text" class="tweet-form__input @error('url') is-invalid @enderror" placeholder="Сайт" 
                name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url">
        </div>
        <div class="tweet-form__btns_center">
            <button class="tweet-form__btn_center" type="submit">Сохранить</button>
        </div>
    </form>
@endsection