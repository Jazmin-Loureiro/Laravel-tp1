<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Mirá aquí tus Categorías') }}
    </h2>
  </x-slot>

  <div class="space-y-4">
    {{-- Bloque para crear nueva categoría --}}
    <a href="{{ route('categories.create') }}" class="group">
  <div class="flex items-center justify-center bg-white w-full rounded-xl p-4 shadow-sm hover:shadow-lg border-2 border-dashed border-gray-300 text-gray-400 group-hover:border-blue-500 group-hover:text-blue-600 transition-all duration-300 cursor-pointer">

    <div class="flex items-center gap-3">
      <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="text-gray-400 group-hover:text-blue-600 fill-none transition-colors duration-300">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
        </svg>
      </div>
      <div class="text-base font-semibold transition-colors duration-300">
        Agregar nueva categoría
      </div>
    </div>
  </div>
</a>


    {{-- Lista de categorías --}}
    @foreach ($categories as $category)
      <div class="flex items-center bg-white w-full rounded-xl p-4 shadow-md transition-transform duration-200 hover:scale-[1.01]
                  {{ !$category->habilitated ? 'grayscale opacity-60' : '' }}"
           style="--tw-bg-opacity: 1; --color: {{ $category->color ?? '#7c3aed' }};">

        {{-- Color --}}
        <div class="w-12 h-12 rounded-lg mr-4 shrink-0" style="background-color: {{ $category->color ?? '#7c3aed' }}"></div>

        {{-- Info --}}
        <div class="flex-grow">
          <p class="font-bold text-gray-800 text-base mb-1">
            <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="hover:underline">
              {{ $category->name }}
            </a>
          </p>
          <p class="text-sm text-gray-500">{{ Str::limit($category->description, 60) }}</p>
        </div>

        {{-- Estado y botón --}}
        <div class="flex items-center gap-4 ml-4 shrink-0">
          <span class="text-xs font-bold {{ $category->habilitated ? 'text-green-600' : 'text-gray-400' }}">
            {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
          </span>
          <a href="{{ route('posts.create', ['category_id' => $category->id]) }}"
             class="w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-xl"
             style="background-color: {{ $category->color ?? '#7c3aed' }};">
            +
          </a>
        </div>
      </div>
    @endforeach
  </div>
</x-app-layout>
