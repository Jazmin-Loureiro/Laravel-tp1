@extends('layout')

@section('content')
    <h2 class="text-4xl font-bold text-center">Posts</h2>

        <h4>{{ $post->title }}</h4>
        <p>{{ $post->content }}</p>
        

@endsection