<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Mira tus posts') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto mb-5">
    @if ($posts->isEmpty())
      <p class="text-center text-gray-500 text-lg">No hay posts disponibles.</p>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($posts as $post)
          <div class="flex flex-col rounded-lg bg-white text-gray-700 shadow-md hover:shadow-xl transition-shadow p-6 h-full">

            <!-- Imagen con altura fija -->
            <div class="relative rounded-lg shadow-lg overflow-hidden h-48">
              <img src="{{ asset('storage/' . $post->poster) }}" alt="{{ $post->title }}" class="w-full h-full object-cover object-center"/>
            </div>

            <!-- Contenido del post -->
            <div class="flex-1 mt-4">
              <h5 class="mb-2 text-xl font-semibold leading-snug text-blue-gray-900">
                {{ $post->title }}
              </h5>
              <p class="text-base font-light leading-relaxed text-gray-700 line-clamp-3">
                {{ Str::limit($post->content, 100) }}
              </p>
            </div>

            <!-- Botón alineado abajo -->
            <div class="pt-4 mt-auto">
              <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                <button class="w-full max-w-xs mx-auto block rounded-lg bg-blue-500 py-2 px-4 text-sm font-semibold text-white hover:bg-blue-600 transition-all" type="button">
                  Leer más
                </button>
              </a>
            </div>

          </div>
        @endforeach
      </div>
    @endif
  </div>
</x-app-layout>

