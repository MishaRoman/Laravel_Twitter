@extends('layout')

@section('title', 'Twitter')

@section('content')
	<section class="wrapper">
		<ul class="tweet-list">
			<li>
			    <article class="tweet">
			        <div class="d-flex">
			            <img class="avatar" src="{{ asset('images/no_avatar.png') }}" alt="Аватар пользователя">
			            <div class="tweet__wrapper">
			                <header class="tweet__header">
			                    <h3 class="tweet-author">{{ $post->user->name }}
			                        <a href="#" class="tweet-author__add tweet-author__nickname">&#64;{{ $post->user->username }}</a>
			                        <time class="tweet-author__add tweet__date">{{ $post->created_at->format('d.m.Y') }}</time>
			                    </h3>
			                    @can('update', $post->user->profile)
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
@endsection