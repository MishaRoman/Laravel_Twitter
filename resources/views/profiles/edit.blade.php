@extends('layouts.layout')

@section('title',  __('profile.profile_settings'))

@section('content')
    <section class="wrapper">
        <h2 class="tweet-form__title">{{ __('profile.profile_settings') }}</h2>
        <div class="tweet-form__error">{{ $errors->first() }}</div>
        <form class="tweet-form" method="POST" action="{{ route('profiles.update', [$user->id]) }}" enctype="multipart/form-data">
            @csrf
        	@method('PATCH')

            <div class="tweet-form__wrapper_inputs">
                <input id="title" type="text" class="tweet-form__input @error('title') is-invalid @enderror"
                    placeholder="{{ __('profile.input_title_placeholder') }}" name="title"
                    value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                <textarea id="description" rows="6" class="tweet-form__input @error('description') is-invalid @enderror"
                    placeholder="{{ __('profile.description') }}" name="description"
                    autofocus>{{ old('description') ?? $user->profile->description }}</textarea>

                <input id="url" type="text" class="tweet-form__input @error('url') is-invalid @enderror"
                    placeholder="{{ __('profile.website') }}" 
                    name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url">

                <div class="d-flex justify-content-center">
                    <label for="image" class="fw-bold fs-5">{{ __('profile.profile_image') }}</label>
                </div>
                <div class="d-flex justify-content-center mt-2 mb-3">
                    
                    <button class="tweet-img__btn" type="button" style="height: inherit;"></button>
                    <input type="file" id="image" name="image">
                </div>
            </div>
            <div class="tweet-form__btns_center">
                <button class="tweet-form__btn_center" type="submit">{{ __('profile.save_btn') }}</button>
            </div>
        </form>
    </section>
@endsection