<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Post') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-lg shadow-md overflow-hidden w-full h-auto sm:max-w-[1000px] mx-auto flex flex-col justify-between p-6 mb-5">
        <div class="flex flex-col sm:flex-row justify-between mb-4 text-sm text-gray-600">
            <div>
                <span class="font-semibold text-gray-700">Creado:</span>
                {{ optional($post->created_at)->format('d/m/Y') ?? 'No disponible' }}
            </div>
            <div>
                <span class="font-semibold text-gray-700">Actualizado:</span>
                {{ optional($post->updated_at)->format('d/m/Y') ?? 'No disponible' }}
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="w-full max-w-[320px] h-[250px] md:h-[400px] rounded-lg  overflow-hidden shadow-md mx-auto md:mx-0 flex-shrink-0">
                @if($post->poster)
                    <img src="{{ asset('storage/' . $post->poster) }}"  alt="Imagen del post {{ $post->title }}"  class="w-full h-full object-cover object-center rounded-xl"/>
                @else
                    <div class="w-full h-full bg-gray-200 rounded-lg  flex items-center justify-center text-gray-400 text-center p-4">
                        Sin imagen disponible
                    </div>
                @endif
            </div>

            <div class="flex-1 min-w-0">
                <div class="flex justify-between items-start flex-wrap gap-y-2 mb-2">
                    <h1 class="text-2xl font-extrabold text-gray-900 break-words">
                        {{ $post->title }}
                    </h1>
                    <span class="text-sm text-indigo-600 font-semibold">
                        {{ $post->category->name ?? 'Sin categoría' }}
                    </span>
                </div>

                <div class="max-w-none text-gray-700 break-words overflow-y-auto max-h-[300px]">
                    {{ $post->content }}
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center gap-4 mt-6 flex-wrap">
            <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:underline">
                ← Volver
            </a>

            <a href="{{ route('posts.edit', $post->id) }}" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-full transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300 whitespace-nowrap">
                Editar
            </a>
        </div>
    </div>
</x-app-layout>
