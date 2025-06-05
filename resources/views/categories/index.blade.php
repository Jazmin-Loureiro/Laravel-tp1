<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Mirá aquí tus Categorías') }}
    </h2>
  </x-slot>

  <div class="space-y-4">
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
