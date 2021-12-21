@extends('layout')

@section('title', $user->name)

@section('sorting')
    @if(Route::is('profiles.sorted'))
        <a href="{{ route('profiles.index', $user->username) }}" class="header__link header__link_sort" title="Сортировать"></a>
    @else
        <a href="{{ route('profiles.sorted', $user->username) }}" class="header__link header__link_sort" title="Сортировать"></a>
    @endif
@endsection

@section('content')
<section class="wrapper">
	<div class="mt-2">
		<div class="row tweet-form__wrapper">
			<div class="col-2">
				<img class="avatar profile__avatar" src="{{ $user->profile->profileImage() }}" alt="Аватар">
			</div>
			<div class="col">
				<h3 class="tweet-author fw-bold">{{ $user->name }}</h3>
				<div class="row">
					<p class="tweet-author__add tweet-author__nickname mt-2">&#64;{{ $user->username }}</p>
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
		<div class="mt-3 mb-3">
			<a class="profile__url" href="#">{{ $user->profile->url ?? '' }}</a>
		</div>
	</div>
</section>
@can('update', $user->profile)
	<section class="wrapper mt-2">
		<h2 class="tweet-form__title">Напишите о чем-нибудь</h2>
		<div class="tweet-form__error">{{ $errors->first() }}</div>
		<form class="tweet-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="tweet-form__wrapper">
				<textarea id="text" class="tweet-form__text" rows="4" placeholder="Что происходит?" required name="text"></textarea>
			</div>
			<div class="tweet-form__btns">
				<button class="tweet-img__btn" type="button"></button>
				<input type="file" id="image" name="image">
				<button class="tweet-form__btn" type="submit">Твитнуть</button>
			</div>
		</form>
	</section>
@endcan
@foreach($posts as $post)
<section class="wrapper">
	<ul class="tweet-list">
		<li>
		    <article class="tweet">
		        <div class="d-flex">
		            <img class="avatar" src="{{ $user->profile->profileImage() }}" alt="Аватар">
		            <div class="tweet__wrapper">
		                <header class="tweet__header">
		                    <h3 class="tweet-author">{{ $user->name }}
		                        <a href="{{ route('profiles.index', $user->username) }}"
		                        	class="tweet-author__add tweet-author__nickname">&#64;{{ $user->username }}
		                        </a>
		                        <time class="tweet-author__add tweet__date">{{ $post->created_at->format('d.m.Y') }}</time>
		                    </h3>
		                    @can('update', $user->profile)
			                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
	                                <button class="tweet__delete-button chest-icon" type="submit"></button>
                                </form>
			                @endcan
		                </header>
		                <a href="{{ route('posts.show', [$post]) }}">
			                <div class="tweet-post">
			                    <p class="tweet-post__text">{{ $post->text }}</p>
			                    @if($post->image)
			                    	<figure class="tweet-post__image">
										<img src="/storage/{{ $post->image }}" alt="">
									</figure>
			                    @endif
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