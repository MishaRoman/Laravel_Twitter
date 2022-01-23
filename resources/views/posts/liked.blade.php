@extends('layouts.layout')

@section('title', __('main.liked_tweets') )

@section('content')

@foreach($posts as $post)
    @include('layouts.post', compact($post))
@endforeach

@endsection