@extends('layouts.layout')

@section('title', $user->name)

@section('content')
<section class="wrapper">
	<div class="mt-2">
		<div class="row tweet-form__wrapper">
			<div class="col-2">
				<img class="avatar profile__avatar" src="{{ $user->profile->profileImage() }}" alt="avatar">
			</div>
			<div class="col">
				<h3 class="tweet-author fw-bold">{{ $user->name }}</h3>
				<div class="row">
					<p class="tweet-author__add tweet-author__nickname mt-2">&#64;{{ $user->username }}</p>
				</div>
			</div>
			@can('update', $user->profile)
			<div class="col-4">
				<div class="mb-3">
					<a class="profile__edit" href="{{ route('profiles.edit', [Auth::user()->username]) }}">
						{{ __('profile.profile_settings') }}
					</a>
				</div>
				<div>
					<a class="profile__edit" href="{{ route('posts.trashed') }}">{{ __('profile.deleted_tweets') }}</a>
				</div>
			</div>
			@else
				<follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
			@endcan
		</div>
		<div class="profile__description lh-sm">{{ $user->profile->description ?? '' }}</div>
		<div class="d-flex mt-3">
			<div class="pe-5">
				<p><strong>{{ $user->profile->followers->count() }}</strong> {{ __('profile.followers') }}</p>
			</div>
			<div class="pe-5">
				<p><strong>{{ $user->following_count }}</strong> {{ __('profile.follows') }}</p>
			</div>
		</div>
		<div class="mt-3 mb-3">
			<a class="profile__url" href="#">{{ $user->profile->url ?? '' }}</a>
		</div>
	</div>
</section>

@can('update', $user->profile)
	<section class="wrapper mt-2">
		<h2 class="tweet-form__title">{{ __('profile.form_title') }}</h2>
		<div class="tweet-form__error">{{ $errors->first() }}</div>
		<form class="tweet-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="tweet-form__wrapper">
				<textarea id="text" class="tweet-form__text" rows="4"
				 placeholder="{{ __('profile.form_placeholder') }}" required name="text"></textarea>
			</div>
			<div class="tweet-form__btns">
				<button class="tweet-img__btn" type="button"></button>
				<input type="file" id="image" name="image">
				<button class="tweet-form__btn" type="submit">{{ __('profile.tweet_button') }}</button>
			</div>
		</form>
	</section>
@endcan

@foreach($user->posts as $post)
	@include('layouts.post', compact($post))
@endforeach

@endsection