@extends('layout')

@section('title', 'Twitter')

@section('content')
<section class="wrapper">
    <ul class="tweet-list">
        <li>
            <article class="tweet">
                <div class="d-flex">
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
                            <p class="tweet-post__text">Lorem ipsum dolor sit amet, consectetur. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa obcaecati impedit voluptas corrupti eius, cumque amet veniam ad temporibus possimus quam nam nostrum consequatur nulla sequi, a officiis in explicabo modi aspernatur, expedita minima neque at est ab! Nostrum, consectetur odit? Praesentium neque consequatur doloremque animi quia. Odit obcaecati, quae.</p>
                        </div>
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