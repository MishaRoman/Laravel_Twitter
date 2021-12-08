@extends('layout')

@section('title', 'Twitter')

@section('content')
<ul class="tweet-list">
    <li>
        <article class="tweet">
            <div class="row">
                <img class="avatar" src="images/mary.jpg" alt="Аватар пользователя">
                <div class="tweet__wrapper">
                    <header class="tweet__header">
                        <h3 class="tweet-author">Мария Иванова
                            <a href="#" class="tweet-author__add tweet-author__nickname">@mary</a>
                            <time class="tweet-author__add tweet__date">11 января</time>
                        </h3>
                        <button class="tweet__delete-button chest-icon"></button>
                    </header>
                    <div class="tweet-post">
                        <p class="tweet-post__text">Lorem ipsum dolor sit amet, consectetur.</p>
                        <figure class="tweet-post__image">
                            <img src="https://picsum.photos/400/300?" alt="Сообщение Марии Lorem ipsum dolor sit amet, consectetur.">
                        </figure>
                    </div>
                </div>
            </div>
            <footer>
                <button class="tweet__like">53</button>
            </footer>
        </article>
    </li>
</ul>
@endsection