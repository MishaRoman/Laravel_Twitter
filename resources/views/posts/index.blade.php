@extends('layouts.layout')

@section('title', __('main.feed') )

@section('content')

@foreach($posts as $post)
    @include('layouts.post', compact($post))
@endforeach

@endsection