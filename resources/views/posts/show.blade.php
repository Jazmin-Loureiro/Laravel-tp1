@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-4xl font-bold text-center mb-6">Post</h2>

        <div class="bg-white shadow-md rounded p-6">
            <h4 class="text-2xl font-semibold mb-4">{{ $post->title }}</h4>
            <p class="text-gray-700 mb-6">{{ $post->content }}</p>
            <img src="{{ asset('storage/' . $post->poster) }}" alt="{{ $post->title }}" class="w-full h-auto rounded mb-4">

            <p class="text-gray-500 text-sm mb-4">{{$post->poster}}</p>
            <p class="text-gray-500 text-sm mb-4">Categoría: {{ $post->category->name }}</p>
            <p class="text-gray-500 text-sm mb-4">Habilitado {{$post->habilitated}}</p>

            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">
                Editar Post
            </a>
        </div>
    </div>
@endsection
