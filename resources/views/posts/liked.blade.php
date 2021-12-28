@extends('layouts.layout')

@section('title', 'Понравившиеся твиты')

@section('sorting')
        @if(Route::is('sorted'))
            <a href="/" class="header__link header__link_sort" title="Сортировать"></a>
        @else
            <a href="{{ route('sorted') }}" class="header__link header__link_sort" title="Сортировать"></a>
        @endif
@endsection

@section('content')

@foreach($posts as $post)
    @include('layouts.post', compact($post))
@endforeach

@endsection