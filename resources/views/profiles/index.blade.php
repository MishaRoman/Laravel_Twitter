@extends('layout')

@section('title', $user->name)

@section('content')
<section class="wrapper">
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
			@can('update', $user->profile)
				<a class="profile__edit" href="{{ route('profiles.edit', [Auth::user()->username]) }}">Настройки профиля</a>
			@else
				<button class="tweet-form__btn" type="submit">Читать</button>
			@endcan
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
</section>
<section class="wrapper mt-5">
	<div class="tweet-form__error">{{ $errors->first() }}</div>
	<form class="tweet-form" action="{{ route('posts.store') }}" method="POST">
		@csrf
		<div class="tweet-form__wrapper">
			<textarea id="text" class="tweet-form__text" rows="4" placeholder="Что происходит?" required name="text"></textarea>
		</div>
		<div class="tweet-form__btns">
			<button class="tweet-form__btn" type="submit">Твитнуть</button>
		</div>
	</form>
</section>

@foreach($user->posts as $post)
<section class="wrapper">
	<ul class="tweet-list">
		<li>
		    <article class="tweet">
		        <div class="d-flex">
		            <img class="avatar" src="{{ asset('images/no_avatar.png') }}" alt="Аватар пользователя">
		            <div class="tweet__wrapper">
		                <header class="tweet__header">
		                    <h3 class="tweet-author">{{ $user->name }}
		                        <a href="#" class="tweet-author__add tweet-author__nickname">@ {{ $user->username }}</a>
		                        <time class="tweet-author__add tweet__date">{{ $post->created_at->format('d.m.Y') }}</time>
		                    </h3>
		                    @can('update', $user->profile)
			                    <button class="tweet__delete-button chest-icon"></button>
			                @endcan
		                </header>
		                <a href="{{ route('posts.show', [$post]) }}">
			                <div class="tweet-post">
			                    <p class="tweet-post__text">{{ $post->text }}</p>
			                </div>
			            </a>
		            </div>
		        </div>
		        <footer>
		            <button class="tweet__like">53</button>
		        </footer>
		    </article>
		</li>
	</ul>
</section>
@endforeach
@endsection