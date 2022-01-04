@extends('layouts.layout')

@section('title', __('main.liked_tweets') )

@section('sorting')
        @if(Route::is('sorted'))
            <a href="/" class="header__link header__link_sort" title="{{ __('main.sorting') }}"></a>
        @else
            <a href="{{ route('sorted') }}" class="header__link header__link_sort"
             title="{{ __('main.sorting') }}"></a>
        @endif
@endsection

@section('content')

@foreach($posts as $post)
    @include('layouts.post', compact($post))
@endforeach

@endsection