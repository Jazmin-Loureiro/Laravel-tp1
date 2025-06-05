<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Mira tus posts') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto mb-5">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <a href="{{ route('posts.create') }}">
         <div class="flex flex-col justify-center items-center rounded-2xl border-2 border-dashed border-gray-300 bg-white text-gray-400 hover:border-blue-500 hover:text-blue-500 transition-all duration-300 shadow-sm hover:shadow-lg p-6 cursor-pointer min-h-[370px] ">
           <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 group-hover:bg-blue-100 transition-colors mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
          </div>
          <span class="text-lg font-semibold tracking-wide">Agregar nuevo post</span>
            <p class="text-sm text-gray-400 mt-1">Publica algo genial</p>
        </div>
      </a>

        @foreach ($posts as $post)
       <div class="flex flex-col rounded-lg shadow-md hover:shadow-xl transition-shadow p-6 h-full
  {{ !$post->habilitated ? 'bg-gray-100 text-gray-500' : 'bg-white text-gray-700' }}">

            <div class="relative rounded-lg shadow-lg overflow-hidden h-48 {{ !$post->habilitated ? 'opacity-15 ' : '' }}">
              <img src="{{ asset('storage/' . $post->poster) }}" alt="{{ $post->title }}" class="w-full h-full object-cover object-center"/>
            </div>

            <div class="flex-1 mt-4">
              <h5 class="mb-2 text-xl font-semibold leading-snug text-blue-gray-900 break-words">
                {{ Str::limit($post->title,35) }}
              </h5>
              <p class="text-base font-light leading-relaxed text-gray-700 line-clamp-1 break-words">
                {{ Str::limit($post->content, 100) }}
              </p>
            </div>

            <div class="pt-4 mt-auto">
              <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="w-full max-w-xs mx-auto block rounded-lg
              {{ !$post->habilitated ? 'bg-green-500 hover:bg-green-900' : ' bg-blue-500 hover:bg-blue-600'}}
               py-2 px-4 text-sm font-semibold text-white transition-all text-center">
                {{ !$post->habilitated ? 'Habilitar' : 'Ver Mas' }}
              </a>
            </div>

          </div>
        @endforeach
      </div>
  </div>
</x-app-layout>

