@extends('layout')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-4xl font-bold text-center mb-6">Categoria</h2>

        <div class="bg-white shadow-md rounded p-6">
            <h4 class="text-2xl font-semibold mb-4">{{ $category->name }}</h4>
            <p class="text-gray-700 mb-6">{{ $category->description }}</p>

            <a href="{{ route('categories.edit', $post->id) }}" class="text-blue-500 hover:underline">
                Editar Categoria
            </a>
        </div>
    </div>
@endsection
