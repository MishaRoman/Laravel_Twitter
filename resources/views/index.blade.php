@extends('layouts.layout')

@section('title', 'Twitter')

@section('content')

@foreach($posts as $post)
    @include('layouts.post', compact($post))
@endforeach
@endsection