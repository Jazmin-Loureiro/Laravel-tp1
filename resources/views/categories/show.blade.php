<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Detalle de Categoría') }}
    </h2>
  </x-slot>

  <div class="bg-gray-100 sm:px-6 overflow-x-hidden min-h-full mb-5">
    <div class="bg-white rounded-lg shadow-md overflow-hidden w-full max-w-full mx-auto">
      <div class="h-2 rounded-t-lg" style="background-color: {{ $category->color ?? '#7c3aed' }}"></div>
      <div class="p-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-2">
          <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 break-words w-full sm:w-auto min-w-0">
            {{ $category->name }}
          </h2>
          <p class="text-sm font-semibold whitespace-nowrap" style="color: {{ $category->habilitated ? '#16a34a' : '#dc2626' }};">
            {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
          </p>
        </div>
        <p class="text-gray-600 leading-relaxed mb-6 break-words break-all max-w-full">
         {{ $category->description }}
        </p>
        <div class="flex justify-end mb-6">
          <a href="{{ route('categories.edit', $category->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-full transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300 whitespace-nowrap">
            Editar Categoría
          </a>
        </div>
        <div class="bg-gray-50 px-4 py-6 border-t border-gray-200 mt-6 rounded overflow-x-auto max-w-full">
          <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">Posts de esta categoría</h3>
          @if ($category->posts->count())
            <ul class="space-y-2 text-indigo-600 font-medium max-w-full">
              @foreach ($category->posts as $post)
                <li>
                  <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="flex items-center justify-between px-4 py-2 rounded-md border border-gray-200 hover:bg-indigo-50 transition group overflow-hidden max-w-full">
                    <div class="flex items-center space-x-3 min-w-0 w-full overflow-hidden">
                      <span class="w-3 h-3 rounded-full bg-indigo-600 group-hover:bg-indigo-800 transition shrink-0"></span>
                      <span class="font-medium text-indigo-700 truncate group-hover:underline block w-full" title="{{ $post->title }}">
                        {{ $post->title }}
                      </span>
                    </div>
                    <svg class="w-4 h-4 text-indigo-400 group-hover:text-indigo-600 transition shrink-0"
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M9 18l6-6-6-6"></path>
                    </svg>
                  </a>
                </li>
              @endforeach
            </ul>
          @else
            <p class="text-gray-500 italic mb-4">No hay posts en esta categoría.</p>
            <a href="{{ route('posts.create') }}" class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-2 rounded-full transition whitespace-nowrap">
              Crear un nuevo post
            </a>
          @endif
        </div>
        <div class="mt-2 flex justify-end">
          <a href="{{ route('categories.index') }}" class="text-sm text-blue-600 hover:underline">
          ← Volver a Categorías
          </a>       
      </div>
    </div>
  </div>
</x-app-layout>
