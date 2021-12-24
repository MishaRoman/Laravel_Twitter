@extends('layouts.layout')

@section('title', 'Twitter')

@section('content')
	@include('layouts.post', compact('post'))
@endsection