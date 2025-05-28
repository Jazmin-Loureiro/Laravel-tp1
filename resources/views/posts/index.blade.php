@extends('layout')

@section('content')
  <h2 class="text-2xl font-bold mb-6">Mira aquí tus Posts</h2>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($posts as $post)
      <div class="relative flex flex-col rounded-xl bg-white text-gray-700 shadow-md hover:shadow-xl transition-shadow p-6">
        
        <div class="relative overflow-hidden rounded-xl shadow-lg aspect-[16/9]">
          <img
            src="{{ asset('storage/' . $post->poster) }}"
            alt="{{ $post->title }}"
            class="w-full h-full object-cover object-center"
          />
        </div>

        <div class="flex-1 mt-4">
          <h5 class="mb-2 text-xl font-semibold leading-snug text-blue-gray-900">
            {{ $post->title }}
          </h5>
          <p class="text-base font-light leading-relaxed text-gray-700 line-clamp-3">
            {{ Str::limit($post->content, 100) }}
          </p>
        </div>

        <div class="pt-4">
          <a href="{{ route('posts.show', ['id' => $post->id]) }}">
            <button class="w-full rounded-lg bg-blue-500 py-2 px-4 text-sm font-semibold text-white hover:bg-blue-600 transition-all">
              Leer más
            </button>
          </a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
