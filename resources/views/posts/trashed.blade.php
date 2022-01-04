@extends('layouts.layout')

@section('title', __('main.deleted_tweets'))

@section('content')

@foreach($posts as $post)
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
                            <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="tweet__restore-button restore-icon" type="submit"
                                    title="{{ __('main.restore') }}"></button>
                            </form>
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
                            likes="{{ $post->likes_count }}"></like-button>
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
@endforeach

@endsection