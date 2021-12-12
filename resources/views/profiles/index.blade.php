@extends('layout')

@section('title', $user->name)

@section('content')

		<div class="mt-2">
		<div class="row tweet-form__wrapper">
			<div class="col-2">
				<img class="avatar profile__avatar" src="{{ asset('images/no_avatar.png') }}" alt="Аватар">
			</div>
			<div class="col">
				<h3 class="tweet-author fw-bold">{{ $user->name }}</h3>
				<div class="row">
					<p class="tweet-author__add tweet-author__nickname mt-2">@ {{ $user->username }}</p>
				</div>
			</div>
			@if(Auth::user()->username != $user->username)
				<button class="tweet-form__btn" type="submit">Читать</button>
			@endif
		</div>
		<div class="profile__description lh-sm">{{ $user->profile->description ?? '' }}</div>
		<div class="d-flex mt-3">
			<div class="pe-5">
				<p><strong>0</strong> читателей</p>
			</div>
			<div class="pe-5">
				<p><strong>0</strong> в читаемых</p>
			</div>
		</div>
		<div class="mt-3">
			<a class="profile__url" href="#">{{ $user->profile->url ?? '' }}</a>
		</div>
	</div>

@endsection