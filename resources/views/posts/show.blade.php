@extends('layouts.layout')

@section('title', 'Twitter')

@section('content')
	<section class="wrapper">
    <ul class="tweet-list">
        <li>
            <article class="tweet">
                <div class="d-flex">
                    <img class="avatar" src="{{ $post->user->profile->profileImage() }}" alt="avatar">
                    <div class="tweet__wrapper">
                        <header class="tweet__header">
                            <h3 class="tweet-author">{{ $post->user->name }}
                                <a href="{{ route('profiles.index', $post->user->username) }}"
                                    class="tweet-author__add tweet-author__nickname">&#64;{{ $post->user->username }}
                                </a>
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
                    @auth
                        <like-button post-id="{{ $post->id }}"
                            liked="{{ auth()->user()->likedPosts->contains($post->id) }}"
                            likes="{{ $post->likes->count() }}"></like-button>
                    @else
                        <a href="login">
                            <button class="tweet__like">{{ $post->likes_count }}</button>
                        </a>
                    @endauth
                </footer>
                </article>
            </li>
        </ul>
    </section>

    <section class="wrapper mt-2">
        <h2 class="tweet-form__title">Комментарии ({{ $post->comments->count() }})</h2>
        <div class="tweet-form__error">{{ $errors->first() }}</div>
        <form class="tweet-form" action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="tweet-form__wrapper">
                <textarea id="message" class="tweet-form__text" rows="4"
                 placeholder="Напишите комментарий" required name="message"></textarea>
            </div>
            <div class="tweet-form__btns">
                <button class="tweet-form__btn" type="submit">Добавить</button>
            </div>
        </form>
    </section>

    <section class="wrapper">
        
        @foreach($post->comments as $comment)
            <ul class="tweet-list">
                <li>
                    <article class="tweet">
                        <div class="d-flex">
                            <img class="avatar" src="{{ $post->user->profile->profileImage() }}" alt="avatar">
                            <div class="tweet__wrapper">
                                <header class="tweet__header">
                                    <h3 class="tweet-author">{{ $comment->user->name }}
                                        <a href="{{ route('profiles.index', $comment->user->username) }}"
                                            class="tweet-author__add tweet-author__nickname">&#64;{{ $comment->user->username }}
                                        </a>
                                        <time class="tweet-author__add tweet__date">{{ $comment->created_at->format('d.m.Y') }}</time>
                                    </h3>
                                    @if($comment->user->id == auth()->user()->id)
                                        <form action="{{ route('comments.destroy', [$post->id, $comment->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="tweet__delete-button chest-icon" type="submit"></button>
                                        </form>
                                    @endcan
                                </header>
                                <div class="tweet-post">
                                    <p class="tweet-post__text">{{ $comment->message }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </li>
            </ul>
        @endforeach
    </section>

@endsection