<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Mirá aquí tus Categorías') }}
    </h2>
  </x-slot>

  <div class="overflow-x-hidden pb-5">
    <div class="space-y-4 sm:px-6 lg:px-8">
      <a href="{{ route('categories.create') }}" class="flex flex-col justify-center items-center rounded-xl border-gray-300 bg-white text-gray-400 hover:border-blue-500 transition-all duration-300 px-0 sm:px-4 max-w-[1200px] mx-auto w-full sm:flex-row shadow-sm hover:shadow-lg p-4 cursor-pointer group border-2 border-dashed">
        <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-gray-100 text-gray-400 group-hover:text-blue-500 text-2xl font-bold shrink-0 mb-3 sm:mb-0 sm:mr-4 transition-colors">
            +
        </div>
        <div class="flex-grow text-center sm:text-left">
            <p class="font-semibold text-gray-500 group-hover:text-blue-500 transition-colors text-base">
                Crear nueva categoría
            </p>
            <p class="text-sm text-gray-400 group-hover:text-gray-600 transition-colors">
               Organizá tus ideas con nuevas categorías 
            </p>
        </div>
      </a>

      @foreach ($categories as $category)
        <div class="px-0 sm:px-4 max-w-[1200px] mx-auto w-full flex flex-col sm:flex-row items-center bg-white rounded-xl p-4 shadow-md transition-transform duration-200 hover:shadow-lg {{ !$category->habilitated ? 'grayscale opacity-60' : '' }}">
          <div class="w-12 h-12 rounded-lg shrink-0 mb-3 sm:mb-0 sm:mr-4" style="background-color: {{ $category->color ?? '#7c3aed' }};"></div>
          <div class="flex-grow min-w-0 text-center sm:text-left">
            <p class="font-bold text-gray-800 text-base mb-1 truncate">
              <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="hover:underline">
                {{ $category->name }}
              </a>
            </p>
            <p class="text-sm text-gray-500 break-words">
              {{ Str::limit($category->description, 60) }}
            </p>
          </div>

          <div class="flex items-center gap-4 mt-4 sm:mt-0 sm:ml-4 justify-center sm:justify-start shrink-0">
            <span class="text-xs font-bold {{ $category->habilitated ? 'text-green-600' : 'text-gray-400' }}">
              {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
            </span>
            <a href="{{ route('posts.create', ['category_id' => $category->id]) }}" class="w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-xl" style="background-color: {{ $category->color ?? '#7c3aed' }};">
              +
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>
