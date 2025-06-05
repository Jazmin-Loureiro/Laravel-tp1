<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Detalle de Categoría') }}
    </h2>
  </x-slot>

  <div class="w-full px-4 sm:px-6 lg:px-8 py-10 bg-gray-100">
    <div class="bg-white rounded-lg shadow-md overflow-hidden w-full max-w-full sm:w-[1100px] mx-auto flex flex-col justify-between">

      {{-- Línea con bordes redondeados arriba (lo que te gustaba) --}}
      <div class="h-2 rounded-t-lg" style="background-color: {{ $category->color ?? '#7c3aed' }}"></div>

      <div class="p-6 font-[Inter]">
        <h2 class="text-3xl font-bold text-gray-800 mb-3">{{ $category->name }}</h2>
        <p class="text-gray-600 leading-relaxed mb-6 break-words">{{ $category->description }}</p>

        <p class="text-sm font-semibold mb-6" style="color: {{ $category->habilitated ? '#16a34a' : '#dc2626' }};">
          {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
        </p>

        <a href="{{ route('categories.edit', $category->id) }}"
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-5 py-2 rounded-lg mb-6 transition">
          Editar Categoría
        </a>

        <div class="bg-gray-50 px-6 py-6 border-t border-gray-200 mt-6">
          <h3 class="text-xl font-semibold text-gray-900 mb-4">Posts de esta categoría</h3>

          @if ($category->posts->count())
            <ul class="space-y-2 text-indigo-600 font-medium">
              @foreach ($category->posts as $post)
                <li class="before:content-['📌'] before:mr-2">
                  <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="hover:underline">{{ $post->title }}</a>
                </li>
              @endforeach
            </ul>
          @else
            <p class="text-gray-500 italic mb-4">No hay posts en esta categoría.</p>
            <a href="{{ route('posts.create') }}"
               class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-2 rounded-lg transition">
              Crear un nuevo post
            </a>
          @endif
        </div>

        <div class="px-6 py-6">
          <a href="{{ route('categories.index') }}"
             class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-2 rounded-lg transition">
            ← Volver a Categorías
          </a>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
