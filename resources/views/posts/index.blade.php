@extends('layout')

@section('content')
    <h2>Mira aquí tus Posts</h2>

    @foreach ($posts as $post)
        <a href="{{ url('/posts/show/' . $post->id) }}">
            {{ $post->title }} (ID: {{ $post->id }})
        </a><br>
    @endforeach
@endsection
