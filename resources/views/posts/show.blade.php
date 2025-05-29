@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto p-4 sm:p-6 bg-white rounded-2xl shadow-xl overflow-hidden min-h-[400px] flex flex-col justify-between">
    <div class="flex flex-col sm:flex-row justify-between mb-4 text-sm text-gray-500">
        <div>
            <span class="font-semibold text-gray-700">Creado:</span>
            {{ $post->created_at->format('d/m/Y') }}
        </div>
        <div>
            <span class="font-semibold text-gray-700">Actualizado:</span>
            {{ $post->updated_at->format('d/m/Y') }}
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-6 md:gap-10 items-start flex-1">

        <div class="w-full md:w-80 rounded-xl overflow-hidden shadow-md flex-shrink-0">
            <img src="{{ asset('storage/' . $post->poster) }}" alt="{{ $post->title }}" class="w-full max-w-full rounded-xl object-cover aspect-[4/3]" />
        </div>

        <div class="flex-1 min-w-0">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2 sm:gap-0">
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 break-words">
                    {{ $post->title }}
                </h1>
                <span class="text-sm text-indigo-600 font-semibold">
                    {{ $post->category->name }}
                </span>
            </div>

            <div class="prose max-w-none text-gray-700 whitespace-pre-line break-words">
                {{ $post->content }}
            </div>
        </div>

    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('posts.edit', $post->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-full transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300 whitespace-nowrap">
            Editar
        </a>
    </div>
</div>
@endsection
